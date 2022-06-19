@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('QR Builder') }}</div>
 
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
                                </div>

                                <div class="mb-3">
                                    <label for="body" class="form-label" >Body</label>
                                    <input type="text" name="body" value="{{ old('body') }}" class="form-control">
                                    @error('body')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="mb-3">
                                    <button type="submit" name="submit" class="btn btn-primary"> Generate QR Code </button>
                                </div>


                            </form> <!-- End: form -->
                        </div> <!-- End: col-8 FORM -->


                        <div class="col-4">
                         @if (session('status'))
                         {!! session('code') !!}
                         @endif

                        </div> <!-- End: col-4 ImageQrCode -->
                    </div><!-- End: row AllData -->


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
