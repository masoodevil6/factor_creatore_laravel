@extends("customer.layouts.master-simple")
@section("titlePage" , " ورود به حساب")

@section('head-tag')
    <link rel="stylesheet" href="{{asset("customer/auth/login.css")}}">
@endsection


@section("content")

    <section id="section-form-login" class="vh-100 d-flex justify-content-center align-items-center pb-5">
        <form method="post" action="{{route("auth.customer.loginRegister")}}">
            @csrf
            <section class="login-wrapper mb-5 color-family-1 rounded shadow">
                <a href="{{route("customer.home")}}" class="login-logo">
                    <img src="{{ getLocationLogoSite() }}" class="logo-site">
                </a>
                <section class="login-title text-white">ورود / ثبت نام</section>

                <section class="login-input-text">
                    <input class="px-2" type="text" name="inputLogin" placeholder="پست الکترونیک یا شماره موبایل">
                    <x-input-errors field="inputLogin"/>
                </section>
                <section class="login-btn d-grid g-2">
                    <button id="btn-submit-form-login" class="btn btn-warning d-block py-1  m-auto text-hover-white">ورود</button>
                </section>
                <section class="login-terms-and-conditions text-white">
                    <a href="#">شرایط و قوانین</a> را خوانده ام و پذیرفته ام
                </section>
            </section>
        </form>
    </section>
@endsection



@section("scripts")

@endsection