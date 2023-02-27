@extends('customer.layouts.master-simple')
@section("titlePage" , " تایید ورود")

@section('head-tag')
    <link rel="stylesheet" href="{{asset("customer/auth/login.css")}}">
@endsection


@section('content')


    <section id="section-form-login" class="vh-100 d-flex justify-content-center align-items-center pb-5">
        <section class="login-wrapper  color-family-1 rounded shadow">

            <form action="{{ route('auth.customer.loginConfirm', $token) }}" method="post">
                @csrf
                <section class=" mb-5">
                    <a href="{{route("customer.home")}}" class="login-logo">
                        <img src="{{ getLocationLogoSite() }}" class="logo-site">
                    </a>
                    <section class="login-title mb-2">
                        <a href="{{ route('auth.customer.loginRegisterForm') }}">
                            <i class="fa fa-arrow-right  text-white"></i>
                        </a>
                    </section>
                    <section class="login-title text-white">
                        کد تایید را وارد نمایید
                    </section>

                    @if($otpType == 0)
                        <section class="login-info  text-white">
                            کد تایید برای شماره موبایل {{ $otpInputLogin }} ارسال گردید
                        </section>
                    @else
                        <section class="login-info  text-white">
                            کد تایید برای ایمیل {{ $otpInputLogin }} ارسال گردید
                        </section>
                    @endif

                    <section id="form-send-result">

                        <section class="login-input-text">
                            <input type="text" name="otp_code" value="{{ old('otp_code') }}"/>
                            <x-input-errors field="otp_code"/>
                        </section>
                        <section class="login-btn d-grid g-2">
                            <button id="btn-submit-form-login" class="btn btn-warning text-hover-white d-block py-1  m-auto">تایید</button>
                        </section>

                    </section>


                    <section id="expired-code" class="d-none">
                        <section class="bg-white border border-danger text-center p-2 rounded-lg text-danger font-size-lg">
                            باطل شد
                        </section>

                        <section class=" text-white font-size-lg mt-2">
                            کد اراسال شده منقضی شده است، لطفا دکمه "دریافت مجدد کدد تایید" را کلیک کنید.
                        </section>
                    </section>


                </section>
            </form>

            <section id="resend-otp" class="d-none">
                <form action="{{route("auth.customer.resendToken" , $token)}}" method="post">
                    @csrf
                    <button type="submit"  class="btn btn-info  text-decoration-none text-white py-1 d-block m-auto ">
                        دریافت مجدد کد تأیید
                    </button>
                </form>
            </section>

            <section class="text-white" id="timer"></section>

        </section>

    </section>


@endsection


@section("scripts")

    <script src="{{asset("customer/auth/login.js")}}" ></script>
    <script>
        setDefaultTime({{$timerDown}});
    </script>

@endsection
