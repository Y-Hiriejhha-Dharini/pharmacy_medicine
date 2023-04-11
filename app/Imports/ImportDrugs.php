<?php

namespace App\Imports;

use App\Models\Drugs;
use Maatwebsite\Excel\Concerns\ToModel;
use ZipArchive;

class ImportDrugs implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Drugs([
            'drug_code' => $row[0],
            'drug_name' => $row[1],
            'drug_price' => $row[2],
            'quantity' => $row[3],
            'status' => 0,
        ]);
    }
}
