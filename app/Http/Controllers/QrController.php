<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Spatie\Color\Hex;

class QrController extends Controller
{
    
  public function index(){
        return view('qr_code.qr_builder');
  } // End Method

  public function do_qr_builder(Request $request){
     //   dd($request->all());

     /*
     $validated = $request->validate([
        'name' => 'required',
        'body' => 'required',
    ]); */ // return redirect()->back()->withError($validated); // Old Version Laravel

    $validated = Validator::make($request->all(), [
        'name' => 'required',
        'body' => 'required'
    ]); 

    if($validated->fails()){
        return back()->withErrors($validated)->withInput();
    } 
   //  return $request->all();

   $name = $request->input('name');
   $qr_img_type = $request->input('qr_img_type') ?? 'png';
   $code = Str::slug($name) . '.' . $qr_img_type; // Riyad Salem >> riyad-salem
   $body = $request->input('body');
   $qr_size = $request->input('qr_size') ?? '300';
   $qr_correction = $request->input('qr_correction') ?? 'H';
   $qr_encoding = $request->input('qr_encoding') ?? 'UTF-8';


      
   

   $qr = QrCode::format($qr_img_type);
   $qr->size($qr_size);
   $qr->errorCorrection($qr_correction);
   $qr->encoding($qr_encoding);
   $qr->generate($body, '../public/qr_code/' . $code);

   return back()->with([
       'status' => 'QR Code generated successfully!',
       'code' => $code
   ]);


  } // End Method

}


