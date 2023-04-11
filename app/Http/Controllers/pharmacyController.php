<?php

namespace App\Http\Controllers;

use App\DataTables\ImageUploadDataTable;
use App\Exports\ExportDrugs;
use App\Http\Controllers\Controller;
use App\Imports\ImportDrugs;
use App\Mail\EmailNotification;
use App\Models\Drugs;
use App\Models\images_upload;
use App\Models\PescriptionUpload;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use App\Notifications\AcceptPrescription;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use ZipArchive;


class pharmacyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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

    public function drug_search()
    {
        $drug = Drugs::where('drug_name','like','%'.request()->drug.'%')->get('drug_name');
        if($drug)
        {
            return $drug;
        }else{
            return 'No medicine in this name';
        }
    }

    public function prescription_upload()
    {
        DB::beginTransaction();
            try{
                PescriptionUpload::create([
                    'user_id' => Auth::user()->id,
                    'prescription_id' => request()->prescritpion_id,
                    'drug_id' => request()->drug_id,
                    'drug_qty' => request()->drug_qty,
                    'status' => 0
                ]);

                $prescription_details = [
                    'total' => request()->total,
                    'prescription_id' => request()->prescritpion_id
                ];

                User::find(Auth::user()->id)->notify(new AcceptPrescription($prescription_details));

                $total = request()->total;
                Mail::to('hirijhaa@gmail.com')->send(new EmailNotification($total));
                dd($total);

                if(Mail::failure())
                {
                    return response()->Fail('Sorry, Try again');
                }else{
                    return response()->success('Email sent successfully');
                }

                DB::commit();
                return redirect('/')->with('Data Saved Successfully and Email Sent');

            }catch(Exception $e)
            {
                DB::rollBack();
                return redirect()->back()->with('Data not saved and mail not sent');
            }
    }

    public function MarkAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }

    public function csv_upload_view()
    {
        return view('drug_upload');
    }

    public function csv_download() 
    {
        return Excel::download(new ExportDrugs, 'drugs.xlsx');
    }

    public function csv_upload()
    {

        if(request()->file() == '')
            {
                return back()->with("error","SELECT A CSV FILE");
            }else{
                request()->validate([
                    'drugs' => 'required'
                ]);

                Excel::import(new ImportDrugs, request()->file('drugs'));
                
                return back();
            }
    }

    public function email_accept()
    {

    }
}
