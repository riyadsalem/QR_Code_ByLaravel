<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Validator;



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
   $body = $request->body;
   
   $code = QrCode::generate($body);

   return back()->with([
    'status' => 'QR Code Generated Successfully',
    'code' => $code,
   ]);


    } // End Method

}


