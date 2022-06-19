<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class QrController extends Controller
{
    
    public function index(){
    //    $qrCode = QrCode::generate('Make me into a QrCode!');
        return view('qr_code.qr_builder');
    } // End Method

}


