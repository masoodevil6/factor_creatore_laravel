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
    @include("factor-creator.error-message")


    <section class=" border border-dark shadow bg-white mt-2 py-1 bg-white row px-2 m-0 d-block">

        <x-component-total-info-factor
                :factor-info='$factor->getFactorModel()'
                :products="$factor -> getProducts()"
                :total-price="$factor -> getTotalPrice()"/>

        <section class="row m-0">

            <section class="col-6">
                <a href="{{route("customer-panel.factors.download-user-factor" , $factor->getFactorModel()->getResNum())}}" type="submit" class="float-right font-size-md btn btn-success rounded  text-white text-center mt-2 py-1 shadow mr-2">
                    <i class="fa fa-download text-white"></i>
                    دانلود
                </a>
            </section>

            <section class="col-6">
                <a href="{{route("customer-panel.home" , "factors")}}" type="submit" class="float-left font-size-md btn btn-success rounded  text-white text-center mt-2 py-1 shadow mr-2">
                    <i class="fa fa-list text-white"></i>
                    مشاهده همه فاکتورها
                </a>
            </section>




        </section>

    </section>



@endsection

@section("scripts")
    <script src="{{asset("customer/factor-creator/form-choose/form-choose.js")}}" ></script>
@endsection
