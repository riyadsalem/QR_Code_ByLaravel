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

   $qr_eye = $request->input('qr_eye') ?? 'square';
   $qr_margin = $request->input('qr_margin') ?? '0';
   $qr_style = $request->input('qr_style') ?? 'square';

   // Used https://github.com/spatie/color >> installation This Package 
   $qr_color = Hex::fromString($request->input('qr_color') ?? '#000000')->toRgba(); // QrCode >>> to Use rgb 

   $qr_background_color = Hex::fromString($request->input('qr_background_color') ?? '#FFFFFF')->toRgb();
   $qr_background_transparent = $request->input('qr_background_transparent') ?? '0';


   $qr_eye_color_inner_0 = Hex::fromString($request->input('qr_eye_color_inner_0') ?? '#000000')->toRgb();
   $qr_eye_color_outer_0 = Hex::fromString($request->input('qr_eye_color_outer_0') ?? '#000000')->toRgb();
   $qr_eye_color_inner_1 = Hex::fromString($request->input('qr_eye_color_inner_1') ?? '#000000')->toRgb();
   $qr_eye_color_outer_1 = Hex::fromString($request->input('qr_eye_color_outer_1') ?? '#000000')->toRgb();
   $qr_eye_color_inner_2 = Hex::fromString($request->input('qr_eye_color_inner_2') ?? '#000000')->toRgb();
   $qr_eye_color_outer_2 = Hex::fromString($request->input('qr_eye_color_outer_2') ?? '#000000')->toRgb();


   $qr_gradient_start = Hex::fromString($request->input('qr_gradient_start') ?? '#000000')->toRgb();
   $qr_gradient_end = Hex::fromString($request->input('qr_gradient_end') ?? '#000000')->toRgb();
   $qr_gradient_type = $request->input('qr_gradient_type') ?? 'vertical';




   $qr = QrCode::format($qr_img_type);
   $qr->size($qr_size);
   $qr->errorCorrection($qr_correction);
   $qr->encoding($qr_encoding);

   $qr->eye($qr_eye );
   $qr->margin($qr_margin );
   $qr->style($qr_style);

   $qr->color($qr_color->red(), $qr_color->green(), $qr_color->blue());
   $qr->backgroundColor($qr_background_color->red(), $qr_background_color->green(), $qr_background_color->blue(), $qr_background_transparent);

   $qr->eyeColor(0,
   $qr_eye_color_inner_0->red(),
   $qr_eye_color_inner_0->green(),
   $qr_eye_color_inner_0->blue(),
   $qr_eye_color_outer_0->red(),
   $qr_eye_color_outer_0->green(),
   $qr_eye_color_outer_0->blue()
   );

   $qr->eyeColor(1,
   $qr_eye_color_inner_1->red(),
   $qr_eye_color_inner_1->green(),
   $qr_eye_color_inner_1->blue(),
   $qr_eye_color_outer_1->red(),
   $qr_eye_color_outer_1->green(),
   $qr_eye_color_outer_1->blue()
   );

   $qr->eyeColor(2,
   $qr_eye_color_inner_2->red(),
   $qr_eye_color_inner_2->green(),
   $qr_eye_color_inner_2->blue(),
   $qr_eye_color_outer_2->red(),
   $qr_eye_color_outer_2->green(),
   $qr_eye_color_outer_2->blue()
   );

   $qr->gradient(
   $qr_gradient_start->red(),
   $qr_gradient_start->green(),
   $qr_gradient_start->blue(),
   $qr_gradient_end->red(),
   $qr_gradient_end->green(),
   $qr_gradient_end->blue(),
   $qr_gradient_type
   );



   $qr->generate($body, '../public/qr_code/' . $code);

   return back()->with([
       'status' => 'QR Code Generated successfully!',
       'code' => $code
   ]);


  } // End Method

}


