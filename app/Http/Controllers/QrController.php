<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QrController extends Controller
{
    
    public function index(){
        return view('qr_code.qr_builder');
    } // End Method

}