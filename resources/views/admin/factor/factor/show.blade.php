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

                <x-component-total-info-factor
                        :factor-info='$factorInfo'
                        :products="$products"
                        :total-price="$totalPrice"/>

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