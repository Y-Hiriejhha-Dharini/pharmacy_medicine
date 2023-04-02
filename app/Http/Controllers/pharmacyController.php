<?php

namespace App\Http\Controllers;

use App\DataTables\ImageUploadDataTable;
use App\Http\Controllers\Controller;
use App\Models\images_upload;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;



class pharmacyController extends Controller
{
    public function prescription_view(images_upload $images_upload)
    {
            $images_upload = images_upload::join('image_details as i','i.images_id','images_uploads.id')
                            ->leftjoin('users as u','u.id','images_uploads.user_id')
                            ->select([
                                'images_uploads.id',
                                'images_uploads.note',
                                'images_uploads.delivery_address',
                                'images_uploads.delivery_time',
                                'i.images_id',
                                'i.path',
                                'i.status'
                            ])
                            ->where('i.status',0)
                            ->orderBy('images_uploads.id')
                            ->groupBy('i.images_id')
                            ->get();

        return view('prescription_view',['images_upload' => $images_upload]);
    }

    public function prescription_quotation($id)
    {
        $images_upload = images_upload::join('image_details as i','i.images_id','images_uploads.id')
            ->join('users as u','u.id','images_uploads.user_id')
            ->where('i.status',0)
            ->where('images_uploads.id',$id)
            ->get();

        return view('prescription_quotation',['images_upload' => $images_upload]);
    }
}
