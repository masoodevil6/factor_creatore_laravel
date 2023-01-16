@extends('customer.layouts.master-one-col')
@section("titlePage" , "ساخت فاکتور- تصاویر")


@section('head-tag')
    <link rel="stylesheet" href="{{asset("public/sweetalert/sweetalert2.css")}}">
    <link rel="stylesheet" href="{{asset("customer/factor-creator/navigation-factor-creator.css")}}">
    <script src="{{asset("plugins/loading_ajax/loading_ajax.js")}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="url-get-info-user-store" content="{{ route("customer.create-factor.get-info-user-store") }}" />
@endsection



@section('main')

    @include("factor-creator.navigation-factor-creator")

    @include("factor-creator.error-message")



    <section class="border border-dark shadow mt-2 p-0 rounded bg-white">

        @include("factor-creator.images.logo.image-logo")

        @include("factor-creator.images.mohr.image-mohr")


        <form id="form-go-to-next-step-process"  action="{{route("customer.images-factor.go-to-next-step-process")}}" method="post" class="">
            @csrf

            <input type="hidden" name="type_logo_name" value="{{$defaultTypeLogo}}">
            <x-input-errors field="type_logo_name"/>
            <input type="hidden" name="type_mohr_name" value="{{$defaultTypeMohr}}">
            <x-input-errors field="type_mohr_name"/>

            <section class="row mt-2 mx-2">

                <section class="col-12 col-lg-4">
                    <a href="{{route("customer.products-factor.index")}}" class="btn btn-info text-white   p-1 m-0 m-2 shadow text-center font-size-md  border border-dark text-decoration-none text-hover-white  px-2 font-weight-bold font-size-md float-right">
                        <i class="fa fa-arrow-right mr-1 border   border-white  rounded p-1"></i>
                        مرحله قبل
                    </a>
                </section>


                <section class="col-12 col-lg-4"></section>


                <section class="col-12 col-lg-4">

                    <button onclick="setInfoAndSubmitForm(this)" type="button" class="btn btn-info text-white   p-1 m-0 m-2 shadow text-center font-size-md  border border-dark text-decoration-none text-hover-white  px-2 font-weight-bold font-size-md float-left">
                        مرحله بعد
                        <i class="fa fa-arrow-left mr-1 border   border-white  rounded p-1"></i>
                    </button>

                </section>

            </section>

        </form>

    </section>



@endsection



@section("scripts")
    <script src="{{asset("public/sweetalert/sweetalert2.all.min.js")}}"></script>
    <script src="{{asset("public/js/delete-form.js")}}"></script>
    <script src="{{asset("customer/factor-creator/images-factor/images-factor.js")}}" ></script>
@endsection
