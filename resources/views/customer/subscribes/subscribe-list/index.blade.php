@extends('customer.layouts.master-one-col')
@section("titlePage" , "اشتراک ها")


@section('head-tag')

@endsection

@section('main')

    @include("customer.subscribes.subscribe-list.list")

@endsection

@section("scripts")

@endsection
