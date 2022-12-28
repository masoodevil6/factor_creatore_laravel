@extends("admin.layouts.master")
@section("titlePage" , "ادمین- اطلاعات فاکتور")


@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.factors.factor.index")}}" class="btn btn-info btn-sm">
                    بازگشت
                </a>

                <a href="{{route("admin.factors.factor.download" , $factor["id"])}}" class="btn btn-success btn-sm">
                    دانلود
                </a>

            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <x-row-tables.admin.component-info-user
                        :user-id='$factor-> user->id'
                        :user-full-name="$factor-> user -> fullName"/>

            </section>


            <section class="mt-3 border-bottom">


                <div class="row my-2">

                    <div class="col-12 col-md-9">

                    </div>

                    <div class="col-12 col-md-3 ">

                        <span class="d-block text-danger text-bold text-center font-size-lg" style="font-weight: bold;">
                            {{$factorInfo->getResNum()}}
                        </span>

                        <span class="d-block text-dark text-bold text-center font-size-md">
                            {{$factorInfo->getCreatedAtJalili()}}
                        </span>

                    </div>

                </div>


                <div class="row">

                    <div class="col-12 col-md-6">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th colspan="2" class="w-5  font-size-12 text-center">فروشگاه</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td class="font-size-12">
                                    نام
                                </td>
                                <td class="font-size-lg text-center">
                                    {{$factorInfo->getStoreName()}}
                                </td>
                            </tr>
                            <tr>
                                <td class="font-size-12">
                                    تلفن
                                </td>
                                <td class="font-size-lg text-center">
                                    {{$factorInfo->getStorePhone()}}
                                </td>
                            </tr>
                            <tr>
                                <td class="font-size-12">
                                    آدرس
                                </td>
                                <td class="font-size-lg text-center">
                                    {{$factorInfo->getStoreAddress()}}
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>


                    <div class="col-12 col-md-6  ">

                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th colspan="2" class="w-5  font-size-12 text-center">خریدار</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td class="font-size-12">
                                    نام
                                </td>
                                <td class="font-size-lg text-center">
                                    {{$factorInfo->getCustomerName()}}
                                </td>
                            </tr>
                            <tr>
                                <td class="font-size-12">
                                    تلفن
                                </td>
                                <td class="font-size-lg text-center">
                                    {{$factorInfo->getCustomerPhone()}}
                                </td>
                            </tr>
                            <tr>
                                <td class="font-size-12">
                                    آدرس
                                </td>
                                <td class="font-size-lg text-center">
                                    {{$factorInfo->getCustomerAddress()}}
                                </td>
                            </tr>

                            </tbody>
                        </table>

                    </div>

                </div>


                <div class="table-responsive px-3">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="w-5  font-size-12">ردیف</th>
                            <th scope="col" class="w-20  font-size-12">نام کالا</th>
                            <th scope="col" class="w-15  font-size-12">تعداد</th>
                            <th scope="col" class="w-20  font-size-12">قیمت واحد</th>
                            <th scope="col" class="w-20  font-size-12">تخفیف</th>
                            <th scope="col" class="w-20  font-size-12">قیمت کل</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($products As $key => $product)

                            <tr>
                                <td class="font-size-12">
                                    {{$key}}
                                </td>
                                <td class="font-size-12" style="font-weight: bold;">
                                    {{$product->getProductName()}}
                                </td>
                                <td class="font-size-12">
                                    {{$product->getProductNumUnitText()}}
                                </td>
                                <td class="font-size-12">
                                    {{$product->getProductPriceText()}}
                                </td>
                                <td class="font-size-12">
                                    {{$product->getProductOffText()}}
                                </td>
                                <td class="font-size-12" style="font-weight: bold;">
                                    {{$product->getProductTotalPriceText()}}
                                </td>

                            </tr>
                        @endforeach

                        <tr class="table-info">
                            <td colspan="3" class="font-size-12">
                                جمع کل
                            </td>
                            <td colspan="3" class="font-size-lg font-bold text-center" style="font-weight: bold;">
                                {{$totalPrice}}
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>



            </section>




            <section class="mt-3 border-bottom">

                <x-fields.component-from-data
                        :action='route("admin.factors.factor.change-form" , $factor->id)'>

                    <x-fields.component-select-options
                            title-en="form_id"
                            title-fa="دسته بندی">

                        @foreach($forms as $itemForm)
                            <option value="{{$itemForm->id}}" @if(isset($factor["form_id"]) && $itemForm["id"]== $factor["form_id"]) selected @endif>
                                {{$itemForm -> name}}
                            </option>
                        @endforeach


                    </x-fields.component-select-options>


                </x-fields.component-from-data>

            </section>

        </section>
    </section>


@endsection


@section("footer-tag")

@endsection