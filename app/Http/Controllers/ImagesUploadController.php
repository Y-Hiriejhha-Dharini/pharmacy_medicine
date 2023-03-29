<?php

namespace App\Http\Controllers;

use App\Models\images_upload;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storeimages_uploadRequest;
use App\Http\Requests\Updateimages_uploadRequest;
use App\Models\ImageDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ImagesUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $img_details = request()->validate([
            'note' => 'required','max:400',
            'delivery_address' => 'required','max:255',
            'delivery_time' => 'required','time',
            'images' => 'required','image',
        ]);

        $images = images_upload::create([
            'user_id' => Auth::user()->id,
            'note' => $img_details['note'],
            'delivery_address' => $img_details['delivery_address'],
            'delivery_time' => $img_details['delivery_time'],
         ]);

         foreach($img_details['images'] as $img)
        {
             ImageDetail::create([
                'path' => $img,
                'status' => 0,
                'images_id' => $images['id']
            ]);
        }

         return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storeimages_uploadRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(images_upload $images_upload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(images_upload $images_upload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateimages_uploadRequest $request, images_upload $images_upload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(images_upload $images_upload)
    {
        //
    }
}
