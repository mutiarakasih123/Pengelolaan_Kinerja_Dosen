<?php

namespace App\Exports;

use App\pelaksanaan;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class sheetUsers implements WithEvents, ShouldAutoSize, WithTitle
{
    private $nama;
    private $nip;
    private $jabatan;
    private $kuant;

    public function __construct(string $nama, string $nip, string $jabatan, string $kuant)
    {
        $this->nama = $nama;
        $this->nip = $nip;
        $this->jabatan = $jabatan;
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        $styleArray = [
            'font' => [
                'size'      => '14',
                'bold'      => true
            ],
        ];
        return [
            // Handle by a closure.
            BeforeSheet::class => function(BeforeSheet $event) {
                $event->sheet->mergeCells('A1:G1');
                $event->sheet->mergeCells('A2:G2');
                $event->sheet->setCellValue('A1','DATA SASARAN KERJA');
                $event->sheet->setCellValue('A2','PEGAWAI NEGERI SIPIL');

                $event->sheet->setCellValue('A4','Nama');
                $event->sheet->setCellValue('A5','NIP');
                $event->sheet->setCellValue('A6','Jabatan');

                $event->sheet->setCellValue('B4',': '.$this->nama);
                $event->sheet->setCellValue('B5',': '.$this->nip);
                $event->sheet->setCellValue('B6',': '.$this->jabatan);

                $event->sheet->mergeCells('A8:A9');
                $event->sheet->mergeCells('B8:B9');
                $event->sheet->mergeCells('C8:C9');
                $event->sheet->mergeCells('D8:G8');
                $event->sheet->setCellValue('A8','NO');
                $event->sheet->setCellValue('B8','Kegiatan Tugas Jabatan');
                $event->sheet->setCellValue('C8','AK');
                $event->sheet->setCellValue('D8','TARGET');
                $event->sheet->setCellValue('D9','Kuant / Output');
                $event->sheet->setCellValue('E9','Kual / Mutu');
                $event->sheet->setCellValue('F9','Waktu');
                $event->sheet->setCellValue('G9','Biaya');

                $event->sheet->setCellValue('B10','Unsur Utama: Pelaksanaan Pendidikan');

                $event->sheet->setCellValue('A11','1');
                $event->sheet->setCellValue('B11','Melaksanakan perkuliahan/tutorial dan membimbing');
                $event->sheet->setCellValue('C11','2'); // untuk AK
                $event->sheet->setCellValue('D11','4 Orang'); // untuk Kuant atau output
                $event->sheet->setCellValue('F11','6 Bulan'); // untuk Waktu

                $event->sheet->setCellValue('A12','2');
                $event->sheet->setCellValue('B12','Membimbing seminar');
                $event->sheet->setCellValue('C12','2'); // untuk AK
                $event->sheet->setCellValue('D12','4 Orang'); // untuk Kuant atau output
                $event->sheet->setCellValue('F12','6 Bulan'); // untuk Waktu

                $event->sheet->setCellValue('A13','3');
                $event->sheet->setCellValue('B13','Membimbing kuliah kerja nyata');
                $event->sheet->setCellValue('C13','2'); // untuk AK
                $event->sheet->setCellValue('D13','4 Orang'); // untuk Kuant atau output
                $event->sheet->setCellValue('F13','6 Bulan'); // untuk Waktu

                $event->sheet->setCellValue('A14','4');
                $event->sheet->setCellValue('B14','Membimbing disertasi, tesis, skripsi dan laporan akhir studi');
                $event->sheet->setCellValue('C14','2'); // untuk AK
                $event->sheet->setCellValue('D14','4 Orang'); // untuk Kuant atau output
                $event->sheet->setCellValue('F14','6 Bulan'); // untuk Waktu

                $event->sheet->setCellValue('A15','5');
                $event->sheet->setCellValue('B15','Bertugas sebagai penguji pada ujian akhir');
                $event->sheet->setCellValue('C15','2'); // untuk AK
                $event->sheet->setCellValue('D15','4 Orang'); // untuk Kuant atau output
                $event->sheet->setCellValue('F15','6 Bulan'); // untuk Waktu

                $event->sheet->setCellValue('A16','6');
                $event->sheet->setCellValue('B16','Membina kegiatan mahasiswa');
                $event->sheet->setCellValue('C16','2'); // untuk AK
                $event->sheet->setCellValue('D16','4 Orang'); // untuk Kuant atau output
                $event->sheet->setCellValue('F16','6 Bulan'); // untuk Waktu
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
                $event->sheet->getStyle('A8:G16')->applyFromArray([
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
                $event->sheet->setShowGridlines(false);
            },
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->nama;
    }
    
}
