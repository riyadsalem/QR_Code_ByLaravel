@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                   <div class="card">
                     <div class="card-header d-flex" style="justify-content: space-between;">
                        {{ __('QR Builder') }}
                        <div class="ml-auto">
                            <a href="{{ route('qr_builder') }}">QR Builder</a> -
                            <a href="{{ route('qr_phone') }}">Phone</a> -
                            <a href="{{ route('qr_email') }}">Email</a> -
                            <a href="{{ route('qr_geo') }}">GEO</a> -
                            <a href="{{ route('qr_sms') }}">SMS</a>
                     </div>
                   </div>
 
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <!-- {{ __('QR Code') }}
                    {!! QrCode::generate('Make me into a QrCode!') !!} -->

                    <div class="row">
                        <div class="col-8">
                            <form action="{{ route('do_qr_builder') }}" method="post">
                                @csrf 

                                <div class="mb-3">
                                    <label for="name" class="form-label" >Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div> <!-- End: mb-3 -->

                                <div class="mb-3">
                                    <label for="body" class="form-label" >Body</label>
                                    <input type="text" name="body" value="{{ old('body') }}" class="form-control">
                                    @error('body')<span class="text-danger">{{ $message }}</span>@enderror
                                </div> <!-- End: mb-3 -->

                                <hr>

                                <div class="row">
                                 <div class="col-12">

                                  <div class="mb-3">
                                     <label for="qr_attachment" class="form-label" >QR Attachment</label>
                                     <select name="qr_attachment" class="form-control">
                                       <option value="no">No</option>
                                       <option value="yes">Yes</option>
                                     </select> <!-- End: select -->
                                  </div>

                                 </div> <!-- End: col-4 -->

                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-3">

                                       <div class="mb-3">
                                          <label for="qr_size" class="form-label" >QR Size</label>
                                          <select name="qr_size" class="form-control">
                                            <option value="">Select Size</option>
                                            <option value="300">300*300</option>
                                            <option value="600">600*600</option>
                                            <option value="900">900*900</option>
                                          </select> <!-- End: select -->
                                       </div>

                                    </div> <!-- End: col-3 -->

                                    <div class="col-3">

                                       <div class="mb-3">
                                          <label for="qr_img_type" class="form-label" >Image Type</label>
                                          <select name="qr_img_type" class="form-control">
                                            <option value="">Select Image Type</option>
                                            <option value="png">PNG</option>
                                            <option value="svg">SVG</option>
                                            <option value="eps">EPS</option>
                                          </select> <!-- End: select -->
                                       </div>

                                    </div> <!-- End: col-3 -->
                                    

                                    <div class="col-3">

                                       <div class="mb-3">
                                          <label for="qr_correction" class="form-label" >QR Correction</label>
                                          <select name="qr_correction" class="form-control">
                                            <option value="">Select QR Correction</option>
                                            <option value="L">7%</option>
                                            <option value="M">15%</option>
                                            <option value="Q">25%</option>
                                            <option value="H">30%</option>
                                          </select> <!-- End: select -->
                                       </div>

                                    </div> <!-- End: col-3 -->
                                    
                                    
                                    <div class="col-3">

                                       <div class="mb-3">
                                          <label for="qr_encoding" class="form-label" >QR Encoding</label>
                                          <select name="qr_encoding" class="form-control">
                                            <option value="">Select QR Encoding</option>
                                            <option value="UTF-8">UTF-8</option>
                                            <option value="ISO-8859-1">ISO-8859-1</option>
                                            <option value="ISO-8859-2">ISO-8859-2</option>
                                            <option value="ISO-8859-3">ISO-8859-3</option>
                                            <option value="ISO-8859-4">ISO-8859-4</option>
                                            <option value="ISO-8859-5">ISO-8859-5</option>
                                            <option value="ISO-8859-6">ISO-8859-6</option>
                                            <option value="ISO-8859-7">ISO-8859-7</option>
                                            <option value="ISO-8859-8">ISO-8859-8</option>
                                            <option value="ISO-8859-9">ISO-8859-9</option>
                                            <option value="ISO-8859-10">ISO-8859-10</option>
                                            <option value="ISO-8859-11">ISO-8859-11</option>
                                            <option value="ISO-8859-12">ISO-8859-12</option>
                                            <option value="ISO-8859-13">ISO-8859-13</option>
                                            <option value="ISO-8859-14">ISO-8859-14</option>
                                            <option value="ISO-8859-15">ISO-8859-15</option>
                                            <option value="ISO-8859-16">ISO-8859-16</option>
                                            <option value="SHIFT-JIS">SHIFT-JIS</option>
                                            <option value="WINDOWS-1250">WINDOWS-1250</option>
                                            <option value="WINDOWS-1251">WINDOWS-1251</option>
                                            <option value="WINDOWS-1252">WINDOWS-1252</option>
                                            <option value="WINDOWS-1256">WINDOWS-1256</option>
                                            <option value="UTF-16BE">UTF-16BE</option>
                                            <option value="ASCII">ASCII</option>
                                            <option value="GBK">GBK</option>
                                            <option value="EUC-KR">EUC-KR</option>
                                          </select> <!-- End: select -->
                                       </div>

                                    </div> <!-- End: col-3 -->
                                
                                
                                </div><!-- End: row -->

                                <hr>


                                <div class="row">
                                    <div class="col-3">

                                       <div class="mb-3">
                                          <label for="qr_eye" class="form-label" >QR Eye</label>
                                          <select name="qr_eye" class="form-control">
                                            <option value="">Select QR Eye</option>
                                            <option value="square">Square</option>
                                            <option value="circle">Circle</option>
                                          </select> <!-- End: select -->
                                       </div>

                                    </div> <!-- End: col-3 -->

                                    <div class="col-3">

                                       <div class="mb-3">
                                          <label for="qr_margin" class="form-label" >QR Margin</label>
                                          <input type="number" name="qr_margin" value="{{ old('qr_margin',0) }}" min="0" max="100" step=".1" class="form-control">
                                       </div>

                                    </div> <!-- End: col-3 -->
                                    

                                    <div class="col-3">

                                       <div class="mb-3">
                                          <label for="qr_style" class="form-label" >QR Style</label>
                                          <select name="qr_style" class="form-control">
                                            <option value="">Select QR Style</option>
                                            <option value="square">Square</option>
                                            <option value="dot">Dot</option>
                                            <option value="round">Round</option>
                                          </select> <!-- End: select -->
                                       </div>

                                    </div> <!-- End: col-3 -->
                                    
                                    
                                    <div class="col-3">

                                       <div class="mb-3">
                                          <label for="qr_color" class="form-label" >QR Color</label>
                                          <input type="color" name="qr_color" 
                                          value="{{ old('qr_color' , '#000000') }}"  class="form-control" >
                                       </div>

                                    </div> <!-- End: col-3 -->
                                
                                
                                </div><!-- End: row -->

                                <hr>

                                <div class="row">
                                    <div class="col-6">
                                        
                                       <div class="mb-3">
                                          <label for="qr_background_color" class="form-label" >
                                            QR Background Color</label>
                                          <input type="color" name="qr_background_color" 
                                          value="{{ old('qr_background_color' , '#FFFFFF') }}"  class="form-control" >
                                       </div>

                                    </div> <!-- End: col-6 -->

                                    <div class="col-6">

                                      <div class="mb-3">
                                          <label for="qr_background_transparent" class="form-label" >
                                            QR Background Transparent</label>
                                          <input type="number" name="qr_background_transparent" value="{{ old('qr_background_transparent',100) }}" min="0" max="100" step="1" class="form-control">
                                       </div>

                                    </div> <!-- End: col-6 -->

                                    
                                </div> <!-- End: row -->

                                <hr>

                                
                                <div class="row">
                                    <div class="col-6">
                                        
                                       <div class="mb-3">
                                          <label for="qr_eye_color_inner_0" class="form-label" >
                                            QR Color Inner 0</label>
                                          <input type="color" name="qr_eye_color_inner_0" 
                                          value="{{ old('qr_eye_color_inner_0' , '#000000') }}"  class="form-control" >
                                       </div>

                                    </div> <!-- End: col-6 -->

                                    <div class="col-6">

                                    <div class="mb-3">
                                          <label for="qr_eye_color_outer_0" class="form-label" >
                                            QR Color Outer 0</label>
                                          <input type="color" name="qr_eye_color_outer_0" 
                                          value="{{ old('qr_eye_color_outer_0' , '#000000') }}"  class="form-control" >
                                       </div>

                                    </div> <!-- End: col-6 -->

                                    
                                </div> <!-- End: row -->

                                <div class="row">
                                    <div class="col-6">
                                        
                                       <div class="mb-3">
                                          <label for="qr_eye_color_inner_1" class="form-label" >
                                            QR Color Inner 1</label>
                                          <input type="color" name="qr_eye_color_inner_1" 
                                          value="{{ old('qr_eye_color_inner_1' , '#000000') }}"  class="form-control" >
                                       </div>

                                    </div> <!-- End: col-6 -->

                                    <div class="col-6">

                                    <div class="mb-3">
                                          <label for="qr_eye_color_outer_1" class="form-label" >
                                            QR Color Outer 1</label>
                                          <input type="color" name="qr_eye_color_outer_1" 
                                          value="{{ old('qr_eye_color_outer_1' , '#000000') }}"  class="form-control" >
                                       </div>

                                    </div> <!-- End: col-6 -->

                                    
                                </div> <!-- End: row -->

                                
                                <div class="row">
                                    <div class="col-6">
                                        
                                       <div class="mb-3">
                                          <label for="qr_eye_color_inner_2" class="form-label" >
                                            QR Color Inner 2</label>
                                          <input type="color" name="qr_eye_color_inner_2" 
                                          value="{{ old('qr_eye_color_inner_2' , '#000000') }}"  class="form-control" >
                                       </div>

                                    </div> <!-- End: col-6 -->

                                    <div class="col-6">

                                    <div class="mb-3">
                                          <label for="qr_eye_color_outer_2" class="form-label" >
                                            QR Color Outer 2</label>
                                          <input type="color" name="qr_eye_color_outer_2" 
                                          value="{{ old('qr_eye_color_outer_2' , '#000000') }}"  class="form-control" >
                                       </div>

                                    </div> <!-- End: col-6 -->

                                    
                                </div> <!-- End: row -->

                                <hr>


                                <div class="row">
                                    <div class="col-4">
                                        
                                       <div class="mb-3">
                                          <label for="qr_gradient_start" class="form-label" >
                                            QR Gradient Start</label>
                                          <input type="color" name="qr_gradient_start" 
                                          value="{{ old('qr_gradient_start' , '#000000') }}"  class="form-control" >
                                       </div>

                                    </div> <!-- End: col-4 -->

                                    <div class="col-4">

                                    <div class="mb-3">
                                          <label for="qr_gradient_end" class="form-label" >
                                            QR Gradient End</label>
                                          <input type="color" name="qr_gradient_end" 
                                          value="{{ old('qr_gradient_end' , '#000000') }}"  class="form-control" >
                                       </div>

                                    </div> <!-- End: col-4 -->

                                    <div class="col-4">

                                       <div class="mb-3">
                                          <label for="qr_gradient_type" class="form-label" >QR Gradient Type</label>
                                          <select name="qr_gradient_type" class="form-control">
                                            <option value="">Select QR Gradient Type</option>
                                            <option value="vertical">Vertical</option>
                                            <option value="horizontal">Horizontal</option>
                                            <option value="diagonal">Diagonal</option>
                                            <option value="inverse_diagonal">Inverse Diagonal</option>
                                            <option value="radial">Radial</option>
                                          </select> <!-- End: select -->
                                       </div>

                                    </div> <!-- End: col-4 -->

                                    
                                </div> <!-- End: row -->



                                <div class="mb-3">
                                    <button type="submit" name="submit" class="btn btn-primary"> Generate QR Code </button>
                                </div> <!-- End: mb-3 -->


                            </form> <!-- End: form -->
                        </div> <!-- End: col-8 FORM -->


                        <div class="col-4" >
                                @if (session('code'))
                                    @if (pathinfo(session('code'))['extension'] === 'eps')
                                        QR Code available, <a href="{{ asset('qr_code/' . session('code')) }}">click here</a> to download it.
                                    @else
                                        <img src="{{ asset('qr_code/' . session('code')) }}" alt="{{ session('code') }}" class="img-fluid">
                                    @endif
                                @endif
                        </div> <!-- End: col-4 ImageQrCode -->
                    </div><!-- End: row AllData -->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
