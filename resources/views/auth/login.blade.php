@if (session()->has('jsAlert'))
<script>
    alert('لقد تسجيل طلبكم بنجاح، المرجو التحقق من بريدكم الإلكتروني');
</script>
@endif
@extends('layouts.app')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@700&display=swap" rel="stylesheet">
<style>
    .container {
        font-family: 'El Messiri', sans-serif;

    }

    .container {
        background: #e1e3f2;
        border-radius: 10px;
        position: relative;
        overflow: hidden;
        width: 768px;
        max-width: 100%;
        min-height: 480px;
    }

    .auth_image {
        border-radius: 50%;
        border: 30px solid #f7eedc;
        max-width: 395PX;
        max-height: 395PX;
    }

    .card {
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
    }

    .container {
        padding: 50px !important;
        margin: auto;
    }

    .logo {
        padding: 10px;
    }

    .logo1 {
        float: right;
        font-weight: bold;
        color: #9099fa;
        font-size: 20px;
    }

    span {
        font-size: 19px;
        font-weight: bold;
        /* color: #767573; */
        color: #7c83c9;
        font-family: 'El Messiri', sans-serif;
    }

    button {
        width: 100%;
        height: 50px;
        border-radius: 10px;
        border: 1px #9099fa;
        background: linear-gradient(#9099fa, #7c83c9);
        color: white
    }
    .logoo{
        max-width: 156px;
        max-height: 200px;
        position: absolute;
        top: -18px;
        right: 0px;
    }
    @media only screen and (max-width: 600px) {
        .container {
            max-width: 132% !important;
            margin: auto;
        }
    }
</style>
@section('content')
<div class="container">
    {{-- <center>
        <img src="{{ asset('AdminLte3/asset/files/img/fondLog.png') }}" alt=""
            style="max-width:240px;max-height:200px;">
    </center> --}}
   
    <div class="card">
        <div class="row">
            <div class="col-lg-6">
                <div class="card-body" style="background-color: #f8f3e9; padding: 30px">
                    <center>
                        <div class=" auth_image">
                            <img src="{{ asset('icones/5836.png') }}" alt=""
                                style="margin: auto;    max-width: 144%; margin-right: -25%;">
                        </div>
                        <img src="{{ asset('AdminLte3/asset/files/img/fondLog.png') }}" alt="" class="logoo"
                        >
                    </center>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card-body">
                    <div class="head">
                        <div class="logo logo1">Login</div>
                        <div class="logo" style="float: left;">
                            <span>الكفاية المدرسية</span>
                            <img src="{{ asset('AdminLte3/asset/files/img/logo-icon.png') }}" alt=""
                                style="margin-top: -7px;">
                        </div>
                    </div>
                    <div style="margin-top:77px;">
                        <p style="font-size:20px;"> تسجيل الدخول</p>
                        <form method="POST" action="{{route('login')}}" class="login-form">
                            @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                            @endif
                            @if(Session::has('fail'))
                            <div class="alert alert-danger">
                                {{Session::get('fail')}}
                            </div>
                            @endif
                            @csrf
                            <div class="form-group">

                                <label>البريد الإلكتروني</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control" placeholder="Email" name="email"
                                        value="{{old('email')}}"><br>
                                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>كلمة السر</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Password"
                                        name="password"><br>
                                    <span class="text-danger">@error('password') {{$message}} @enderror</span>
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="remember-me">
                                    <label for="remember-me" class="form-check-label">تذكرني</label>
                                </div>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}" style="color: 9099fa;">
                                    {{ __('هل نسيت كلمة السر؟') }}
                                </a>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" style="border-radius: 10px;" class="login-btn">{{ __('تسجيل
                                    الدخول') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection