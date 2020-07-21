<?php
namespace App\Exports;

use App\pelaksanaan;
use App\users;
use App\countSks;
use App\subUnsur23;
use App\sesi;
use App\subUnsur4;
use App\subUnsur5;
use App\subUnsur6;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Session;
use DB;

class PelaksanaanExport implements WithEvents, WithTitle
{
    private $id;
    private $status;

    public function __construct(int $id, $status)
    {
        $this->id = $id;
        $this->status = $status;
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        $status = $this->status;
        $idUser = session::get('userId');
        $user = users::find($idUser);
        $Kuant = 0;
        $AK = 0;
        $waktu = '';
        $mutu = '-';
        $pelaksanaan = pelaksanaan::find($this->id);
        $kegiatan = $pelaksanaan->kegiatan;
        $mulai = date('m',strtotime($pelaksanaan->tglMulai));
        $selesai = date('m',strtotime($pelaksanaan->tglSelesai));
        $penugasan = $pelaksanaan->penugasan;
        $dokumen = $pelaksanaan->dokumen;
        $waktu = $selesai - $mulai;
        if ($waktu == 0) {
            $mulai = date('d',strtotime($pelaksanaan->tglMulai));
            $selesai = date('d',strtotime($pelaksanaan->tglSelesai));
            $waktu = ($selesai - $mulai).' Hari';
        }else{
            $waktu = $waktu. ' Bulan';
        }
        
        if ($status == 'skp') {
            $getCount = countSks::where('pelaksanaan',$this->id)->where('dosen',$idUser)->sum('countSkp');
        }
        if ($status == 'bkd') {
            $getCount = countSks::where('pelaksanaan',$this->id)->where('dosen',$idUser)->sum('countBkd');
        }
        if ($pelaksanaan->subUnsur == 1) {
            $Kuant = $getCount.' SKS';
            if ($user->jakademi == 'Asisten Ahli') {
                $AK = $getCount*0.5;
            }
            if ($user->jakademi == 'Lektor') {
                $AK = $getCount*1;
            }
        }
        if ($pelaksanaan->subUnsur == 2 || $pelaksanaan->subUnsur == 3) {
            $getSiswa = subUnsur23::where('idPelaksanaan',$pelaksanaan->id)->first();
            $count = sesi::where('idUnsur',$getSiswa->id)->where('unsur',$pelaksanaan->subUnsur)->get()->count();
            $countUser = sesi::where('idUnsur',$getSiswa->id)->where('unsur',$pelaksanaan->subUnsur)->where('idDosenG',$idUser)->get()->count();
            $Kuant = $getSiswa->jmlMHS;
            $AK = (($getSiswa->jmlSKS/$count)*$Kuant)*$countUser;
            if ($status == 'skp') {
                $Kuant = $Kuant.' Mahasiswa';
            }else{
                $Kuant = $getCount.' SKS';
            }
        }
        if ($pelaksanaan->subUnsur == 4) {
            $getSiswa = subUnsur4::where('idpelaksanaan',$pelaksanaan->id)->first();
            $Kuant = $getSiswa->jmlMHS;
            $AK = $Kuant*$getCount;
            $Kuant = $Kuant.' Mahasiswa';
        }
        if ($pelaksanaan->subUnsur == 5) {
            $getSiswa = subUnsur5::where('idpelaksanaan',$pelaksanaan->id)->first();
            $Kuant = $getSiswa->jmlMHS;
            $AK = $Kuant*$getCount;
            $Kuant = $Kuant.' Mahasiswa';
        }
        if ($pelaksanaan->subUnsur == 6) {
            $getSiswa = subUnsur6::where('idpelaksanaan',$pelaksanaan->id)->first();
            $Kuant = $getSiswa->jmlKeg;
            $AK = $getSiswa->jmlKeg;
            $Kuant = $Kuant.' Kegiatan';
            $mutu = $pelaksanaan->mutu;
        }
        
        $styleArray = [
            'font' => [
                'size'      => '14',
                'bold'      => true
            ],
        ];
        return [
            // Handle by a closure.
            BeforeSheet::class => function(BeforeSheet $event) use ($user,$Kuant,$AK,$waktu,$kegiatan,$mutu,$status,$penugasan,$dokumen) {
                $event->sheet->mergeCells('A1:G1');
                if ($status == 'skp') {
                    $event->sheet->mergeCells('A2:G2');
                    $event->sheet->setCellValue('A1','DATA SASARAN KERJA');
                    $event->sheet->setCellValue('A2','PEGAWAI NEGERI SIPIL');
                } else {
                    $event->sheet->setCellValue('A1','KINERJA BIDANG PELAKSANAAN PENDIDIKAN');
                }
                
                $event->sheet->setCellValue('A4','Nama');
                $event->sheet->setCellValue('A5','NIP');
                $event->sheet->setCellValue('A6','Jabatan');

                $event->sheet->setCellValue('B4',': '.$user->nama);
                $event->sheet->setCellValue('B5',': '.$user->nip);
                $event->sheet->setCellValue('B6',': '.$user->jakademi);

                $event->sheet->mergeCells('A8:A9');
                $event->sheet->mergeCells('B8:B9');
                $event->sheet->setCellValue('A8','NO');
                if ($status == 'skp') {
                    $event->sheet->mergeCells('D8:G8');
                    $event->sheet->mergeCells('C8:C9');
                    $event->sheet->setCellValue('B8','Kegiatan Tugas Jabatan');
                    $event->sheet->setCellValue('C8','AK');
                    $event->sheet->setCellValue('D8','TARGET');
                    $event->sheet->setCellValue('D9','Kuant / Output');
                    $event->sheet->setCellValue('E9','Kual / Mutu');
                    $event->sheet->setCellValue('F9','Waktu');
                    $event->sheet->setCellValue('G9','Biaya');
                    $event->sheet->setCellValue('C11',$AK); // untuk AK
                    $event->sheet->setCellValue('F11',$waktu);
                    $event->sheet->setCellValue('D11',$Kuant); // untuk Kuant atau output
                    $event->sheet->setCellValue('E11',$mutu); // untuk Mutu
                } else {
                    $event->sheet->mergeCells('C8:D8');
                    $event->sheet->mergeCells('E8:E9');
                    $event->sheet->mergeCells('F8:G8');
                    $event->sheet->setCellValue('B8','Jenis Kegiatan');
                    $event->sheet->setCellValue('C8','Beban Kegiatan');
                    $event->sheet->setCellValue('C9','Bukti Penugasan');
                    $event->sheet->setCellValue('D9','SKS');
                    $event->sheet->setCellValue('E8','Masa Penugasan');
                    $event->sheet->setCellValue('F8','Kinerja');
                    $event->sheet->setCellValue('F9','Bukti Dokumen');
                    $event->sheet->setCellValue('G9','SKS');
                    $event->sheet->setCellValue('C11',$penugasan);
                    $event->sheet->setCellValue('D11',$Kuant);
                    $event->sheet->setCellValue('E11',$waktu);
                    $event->sheet->setCellValue('F11',$dokumen);
                    $event->sheet->setCellValue('G11',$Kuant);
                }
                $event->sheet->setCellValue('B10','Unsur Utama: Pelaksanaan Pendidikan');
                $event->sheet->setCellValue('A11','1');
                $event->sheet->setCellValue('B11',$kegiatan);
            },

            AfterSheet::class => function(AfterSheet $event) use ($styleArray) {
                // untuk set style
                $event->sheet->getStyle('A1:F100')->applyFromArray(
                    array('font' => [
                        'name'    => 'Times New Roman',
                    ])
                );
                
                $event->sheet->getStyle('A1:A2')->applyFromArray($styleArray);
                $event->sheet->getStyle('A8:G9')->applyFromArray(
                    array(
                        'font' => [
                            'bold' => true
                        ],
                    )
                );
                $event->sheet->getStyle('A8:G11')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
                $event->sheet->getStyle('A4:B6')->applyFromArray(
                    array('font' => [
                        'size'      => '12',
                    ])
                );

                // untuk set align
                $event->sheet->getStyle('A1:A2')->getAlignment()->applyFromArray(
                    array('horizontal' => 'center')
                );
                $event->sheet->getStyle('A11:A16')->getAlignment()->applyFromArray(
                    array('horizontal' => 'center')
                );
                $event->sheet->getStyle('C11:G16')->getAlignment()->applyFromArray(
                    array('horizontal' => 'center')
                );
                $event->sheet->getStyle('A8:G9')->getAlignment()->applyFromArray(
                    array(
                        'vertical' => 'center',
                        'horizontal' => 'center'
                    )
                );
                $event->sheet->getStyle('A11')->getAlignment()->applyFromArray(
                    array(
                        'vertical' => 'center',
                        'horizontal' => 'center'
                    )
                );
                $event->sheet->getStyle('C11:G11')->getAlignment()->applyFromArray(
                    array(
                        'vertical' => 'center',
                        'horizontal' => 'center'
                    )
                );
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(100);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(17);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(15);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(17);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(17);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(15);
                $event->sheet->getStyle('B11')->getAlignment()->setWrapText(true);
                $event->sheet->setShowGridlines(false);
            },
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {   
        $idUser = session::get('userId');
        $user = users::find($idUser);
        return $user->nama;
    }
    
}
