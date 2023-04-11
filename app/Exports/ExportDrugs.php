<?php

namespace App\Exports;

use App\Models\Drugs;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportDrugs implements FromView,  ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct()
    {
        
    }
    // public function collection()
    // {
    //     // return 
    //     return Drugs::all();
    // }

    public function view(): View
    {
        $datas  = Drugs::all();
        return view('drug_download',['datas' => $datas]);
    }
}
