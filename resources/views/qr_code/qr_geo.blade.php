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


                    <div class="text-center">
                    {!! QrCode::geo(31.560038, 34.483848); !!}
                    </div><!-- End: row -->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
