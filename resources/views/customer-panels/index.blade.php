@extends('customer.layouts.master-two-col')
@section('titlePage' , "پنل کاربری: ".Auth::user()->fullName )

@section('head-tag')
    <link rel="stylesheet" href="{{asset("customer/customer-panels/customer-panels.css")}}">
    <meta name="url-this-panel" content="{{ route("customer-panel.home") }}" />
    <meta name="url-get-view-panel" content="{{ route("customer-panel.get-view-panel") }}" />
    <meta name="csrf-token-customer-panel" content="{{ csrf_token() }}" />
    <script src="{{asset("plugins/loading_ajax/loading_ajax.js")}}"></script>
@endsection


@section('sidebar')
    <section id="list_panel_customer">
        @include("customer-panels.list-customer-panels")
    </section>
@endsection


@section('main')
    <section id="panel_view" class="mt-2 mt-md-0 @if($panel == "") d-none @endif">
        {!! $panelView !!}
    </section>
@endsection


@section("scripts")
    <script src="{{asset("customer/customer-panels/customer-panels.js")}}"></script>
    @if($panel != "")
        <script>
            setTrueIntoPanel();
        </script>
    @endif
@endsection
