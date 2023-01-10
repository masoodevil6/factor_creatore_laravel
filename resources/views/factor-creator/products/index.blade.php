@extends('customer.layouts.master-one-col')

@section('head-tag')
    <link rel="stylesheet" href="{{asset("public/sweetalert/sweetalert2.css")}}">
    <link rel="stylesheet" href="{{asset("customer/factor-creator/navigation-factor-creator.css")}}">
    <script src="{{asset("plugins/loading_ajax/loading_ajax.js")}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="url-get-info-factor-product" content="{{ route("customer.products-factor.get-info-factor-product") }}" />
@endsection

@section('main')

    @include("factor-creator.navigation-factor-creator")
    @include("factor-creator.error-message")


    @include("factor-creator.products.list-products")

    <section id="section-info-factor-product">

    </section>

@endsection

@section("scripts")
    <script>
        var passPrice = "{{$passPrice}}";
    </script>
    <script src="{{asset("public/sweetalert/sweetalert2.all.min.js")}}"></script>
    <script src="{{asset("public/js/delete-form.js")}}"></script>
    <script src="{{asset("customer/factor-creator/products-factor/products-factor.js")}}" ></script>
    <script src="{{asset("public/js/public.js")}}" ></script>
@endsection
