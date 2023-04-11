<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Drugs extends Model
{
    use HasFactory;

    public $table= 'drugs';

    public static function drug_names()
    {
       return Drugs::all(['id','drug_name','drug_price']);
    }

    public function drugs() :HasOne
    {
        return $this->hasOne(PescriptionUpload::class, 'drug_id');
    }
}
