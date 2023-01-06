@extends('customer.layouts.master-one-col')
@section("titlePage" , "اشتراک: ". $subscribe->info["title"])


@section('head-tag')

@endsection

@section('main')

    @include("customer.subscribes.subscribe-info.info")
    @include("customer.subscribes.subscribe-info.forms")

@endsection

@section("scripts")

@endsection
