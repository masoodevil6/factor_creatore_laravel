@extends('customer.layouts.master-one-col')
@section("titlePage" , "ساخت فاکتور- اطلاعات")


@section('head-tag')
    <link rel="stylesheet" href="{{asset("customer/factor-creator/navigation-factor-creator.css")}}">
    <script src="{{asset("plugins/loading_ajax/loading_ajax.js")}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="url-get-info-user-store" content="{{ route("customer.create-factor.get-info-user-store") }}" />
@endsection

@section('main')

    @include("factor-creator.navigation-factor-creator")
    @include("factor-creator.error-message")


    @include("factor-creator.info.info-factor")

@endsection

@section("scripts")
    <script src="{{asset("customer/factor-creator/info-factor/info-factor.js")}}" ></script>
@endsection
