@extends('forms.layouts.master')

@section('head-tag')
@endsection

@section('content')

    <div class="display_flow_root margin_y_2">

        <div class="float_left width_25_percent text_align_center ">

            <p class="margin_zero text_align_center display_block color_red_1 text_bold font_3">
                {{$factor->getResNum()}}
            </p>

            <p class="margin_zero text_align_center display_block font_3">
                {{$factor->getCreatedAtJalili()}}
            </p>

        </div>


        <div class="width_75_percent float_left">
            @if(!empty($factor->getLogoName()))
                <img src="{{$factor->getLogoName()}}" alt="تصویر لوگو" height="60" class="float_right">
            @endif
        </div>

    </div>


    <div class="display_flow_root ">

        <div class="width_50_percent float_right">
            <table  class=" table table-striped table-bordered">

                <thead class="thead-dark">
                <tr>
                    <th colspan="2" class="w-5  font-size-12 text-center py-1">فروشگاه</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td class="font-size-12 py-1">
                        نام
                    </td>
                    <td class="font-size-lg text-center py-1">
                        {{$factor->getStoreName()}}
                    </td>
                </tr>
                <tr>
                    <td class="font-size-12 py-1">
                        تلفن
                    </td>
                    <td class="font-size-lg text-center py-1">
                        {{$factor->getStorePhone()}}
                    </td>
                </tr>
                <tr>
                    <td class="font-size-12 py-1">
                        آدرس
                    </td>
                    <td class="font-size-lg text-center py-1">
                        {{$factor->getStoreAddress()}}
                    </td>
                </tr>

                </tbody>
            </table>
        </div>


        <div class="width_50_percent float_left">

            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th colspan="2" class="w-5  font-size-12 text-center py-1">خریدار</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td class="font-size-12 py-1">
                        نام
                    </td>
                    <td class="font-size-lg text-center py-1">
                        {{$factor->getCustomerName()}}
                    </td>
                </tr>
                <tr>
                    <td class="font-size-12 py-1">
                        تلفن
                    </td>
                    <td class="font-size-lg text-center py-1">
                        {{$factor->getCustomerPhone()}}
                    </td>
                </tr>
                <tr>
                    <td class="font-size-12 py-1">
                        آدرس
                    </td>
                    <td class="font-size-lg text-center py-1">
                        {{$factor->getCustomerAddress()}}
                    </td>
                </tr>

                </tbody>
            </table>

        </div>

    </div>


@endsection

@section("scripts")
@endsection

