<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class images_upload extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function findlastUpload()
    {
        $user_available = images_upload::where('user_id',Auth::user()->id)->whereDate('created_at',date('Y-m-d'))->orderBy('id','desc')->first();

        if($user_available){
            if((int)date('H:m:s') - (int)$user_available->created_at->format('H:m:s') > 2){
                return true;
            }else{
                return false;
            }
        }
        return true;
    }
}
