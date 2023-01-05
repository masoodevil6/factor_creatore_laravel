@extends('customer.layouts.master-one-col')
@section("titlePage" , "درباره ما")

@section('head-tag')
    <link rel="stylesheet" href="{{asset("customer/public/css/component-slider-selected-forms.css")}}">
@endsection

@section('main')

    @include("customer.about-us.about-us")

    <x-component-slider-selected-forms
            :forms-selected="$formsSelected"/>

@endsection

@section("scripts")
    <script src="{{asset("customer/public/js/component-slider-selected-forms.js")}}"></script>
@endsection
