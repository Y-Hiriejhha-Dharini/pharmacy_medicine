<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pharmacyController extends Controller
{
    public function prescription_view()
    {
        return view('prescription_view');
    }
}
