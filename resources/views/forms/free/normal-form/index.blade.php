@extends('forms.layouts.master')

@section('head-tag')
@endsection

@section('content')



    @if($size == \Illuminate\Support\Facades\Config::get("forms.size_A4"))

        <style>
            .font-size-normal{
                font-size: 12pt;
                line-height: 18pt;
                height: 18pt;
            }

            .height-normal{
                height: 36pt;
            }

            #app-name{
                line-height: 1000px;
            }

        </style>

    @elseif($size == \Illuminate\Support\Facades\Config::get("forms.size_A5"))

        <style>
            .font-size-normal{
                font-size: 10pt;
                line-height: 15pt;
                height: 15pt;
            }

            .height-normal{
                height: 15pt;
            }

            #app-name{
                line-height: 500px;
            }
        </style>

    @endif


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







