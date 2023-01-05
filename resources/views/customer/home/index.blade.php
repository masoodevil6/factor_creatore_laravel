@extends('customer.layouts.master-one-col')

@section('head-tag')
    <link rel="stylesheet" href="{{asset("customer/public/css/component-slider-selected-forms.css")}}">
    @auth
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="url-like-or-dislike-comment" content="{{ route("customer-panel.commands.like-or-dislike-command") }}" />
    @endauth
@endsection

@section('main')

    <x-component-slider-selected-forms
            :forms-selected="$formsSelected"/>

    @include("customer.home.list-subscribes")

    @include("customer.home.list_comment")

@endsection

@section("scripts")
    <script src="{{asset("customer/public/js/component-slider-selected-forms.js")}}"></script>
    @auth
        <script src="{{asset("customer/home/home.js")}}"></script>
    @endauth
@endsection
