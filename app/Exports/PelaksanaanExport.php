<?php

namespace App\Exports;

use App\users;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PelaksanaanExport implements WithMultipleSheets
{
    use Exportable;

    /**
     * @return array
     */
    public function sheets(): array
    {
        $user = users::where('akses',2)->get();
        $sheets = [];

        foreach ($user as $key => $data) {
            $sheets[] = new sheetUsers($data->nama, $data->nip, $data->jakademi);
        }

        return $sheets;
    }
    
}
