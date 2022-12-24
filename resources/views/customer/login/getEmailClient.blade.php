@extends("customer.layouts.master-simple")
@section("titlePage" , " ورود به حساب")

@section('head-tag')
    <link rel="stylesheet" href="{{asset("customer/auth/login.css")}}">
@endsection


@section("content")

    <section id="section-form-login" class="vh-100 d-flex justify-content-center align-items-center pb-5">
        <form method="post" action="{{route("auth.customer.loginRegister")}}">
            @csrf
            <section class="login-wrapper mb-5">
                <section class="login-logo">
                    <img src="{{getLocationLogoSite()}}" alt="">
                </section>
                <section class="login-title">ورود / ثبت نام</section>

                <section class="login-input-text">
                    <input type="text" name="inputLogin" placeholder="پست الکترونیک یا شماره موبایل">
                    <x-input-errors field="inputLogin"/>
                </section>
                <section class="login-btn d-grid g-2">
                    <button id="btn-submit-form-login" class="btn btn-danger d-block py-1  m-auto">ورود</button>
                </section>
                <section class="login-terms-and-conditions"><a href="#">شرایط و قوانین</a> را خوانده ام و پذیرفته ام</section>
            </section>
        </form>
    </section>
@endsection



@section("scripts")

@endsection