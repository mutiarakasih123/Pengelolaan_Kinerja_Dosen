<?php

namespace App\Exports;

use App\pelaksanaan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromView;

class PelaksanaanExport implements FromView
{
    public function __construct($id)
    {
        $this->id = $id;
    }
    public function view(): View
    {
        $data = pelaksanaan::find($this->id);
        return view('export.export', compact('data'));
    }
}
