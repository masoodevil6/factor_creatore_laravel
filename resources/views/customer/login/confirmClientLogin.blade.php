@extends('customer.layouts.master-simple')
@section("titlePage" , " تایید ورود")

@section('head-tag')
    <link rel="stylesheet" href="{{asset("customer/auth/login.css")}}">
@endsection


@section('content')


    <section id="section-form-login" class="vh-100 d-flex justify-content-center align-items-center pb-5">
        <section class="login-wrapper">

            <form action="{{ route('auth.customer.loginConfirm', $token) }}" method="post">
                @csrf
                <section class=" mb-5">
                    <section class="login-logo">
                        <img src="{{ getLocationLogoSite() }}" alt="">
                    </section>
                    <section class="login-title mb-2">
                        <a href="{{ route('auth.customer.loginRegisterForm') }}">
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </section>
                    <section class="login-title">
                        کد تایید را وارد نمایید
                    </section>

                    @if($otp->type == 0)
                        <section class="login-info">
                            کد تایید برای شماره موبایل {{ $otp->input_login }} ارسال گردید
                        </section>
                    @else
                        <section class="login-info">
                            کد تایید برای ایمیل {{ $otp->input_login }} ارسال گردید
                        </section>
                    @endif
                    <section class="login-input-text">
                        <input type="text" name="otp_code" value="{{ old('otp_code') }}"/>
                        <x-input-errors field="otp_code"/>
                    </section>
                    <section class="login-btn d-grid g-2">
                        <button id="btn-submit-form-login" class="btn btn-danger d-block py-1  m-auto">تایید</button>
                    </section>
                </section>
            </form>

            <section id="resend-otp" class="d-none">
                <form action="{{route("auth.customer.resendToken" , $token)}}" method="post">
                    @csrf
                    <button type="submit"  class="btn btn-info  text-decoration-none text-white py-1 d-block m-auto">
                        دریافت مجدد کد تأیید
                    </button>
                </form>
            </section>

            <section id="timer"></section>

        </section>

    </section>


@endsection


@section("scripts")

    <script src="{{asset("customer/auth/login.js")}}" ></script>
    <script>
        setDefaultTime({{$timerDown}});
    </script>

@endsection
