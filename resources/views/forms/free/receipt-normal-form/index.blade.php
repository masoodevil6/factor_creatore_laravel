@extends('forms.layouts.master')

@section('head-tag')
@endsection

@section('content')



    <style>
        .font-size-normal{
            font-size: 10pt;
            line-height: 15pt;
            height: 15pt;
        }

        .height-normal{
            height: 15pt;
        }

    </style>



    <style>
        #app-name{
            line-height: {{\Illuminate\Support\Facades\Config::get("forms.center_A6_width")}};
        }

        .item-page{
            width: 100%;
            height: 100%;
        }
    </style>


    @foreach($productsInPage as $key => $infoPage)

        <div class="page" >
            @include("forms.free.receipt-normal-form.item-page")
        </div>

        @if($key < sizeof($productsInPage) - 1)
            <pagebreak/>
        @endif

    @endforeach


@endsection

@section("scripts")
@endsection







