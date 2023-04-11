<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\EmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function send_mail(Request $request)
    {
        $total = 100;
        Mail::to('hirijhaa@gmail.com')->send(new EmailNotification($total));

        if(Mail::failure())
        {
            return response()->Fail('Sorry, Try again');
        }else{
            return response()->success('Email sent successfully');
        }
    }
}
