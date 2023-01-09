@extends('customer.layouts.master-one-col')

@section('head-tag')
    <link rel="stylesheet" href="{{asset("customer/factor-creator/navigation-factor-creator.css")}}">
    <script src="{{asset("plugins/loading_ajax/loading_ajax.js")}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="url-get-forms-in-form-category" content="{{ route("customer.forms-factor.get-forms-in-form-category") }}" />
    <meta name="url-get-info-form" content="{{ route("customer.forms-factor.get-info-form") }}" />
@endsection

@section('main')

    @include("factor-creator.navigation-factor-creator")


@endsection

@section("scripts")
    <script src="{{asset("customer/factor-creator/form-choose/form-choose.js")}}" ></script>
@endsection
