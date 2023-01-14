@extends('forms.layouts.master')

@section('head-tag')
@endsection

@section('content')

    @foreach($productsInPage as $key => $infoPage)

        <section class="page">
            @include("forms.free.normal-form.item-page")
        </section>

        @if($key < sizeof($productsInPage) - 1)
            <pagebreak/>
        @endif

    @endforeach

@endsection

@section("scripts")
@endsection







