@extends("admin.layouts.master")
@section("titlePage" , "ادمین- اطلاعات واحد")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0">
        <section class="main-body-container col-12 my-2">

            <section class="main-body-container-header">
                <h5>
                     اطلاعات واحد
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.public.unit.index")}}" class="btn btn-info btn-sm">
                    بازگشت
                </a>

            </section>

            <section class="mt-2">

                <x-fields.component-from-data
                        :action='(isset($unit["id"]) && $unit["id"] > 0) ? route("admin.public.unit.update" , $unit["id"]) : route("admin.public.unit.store") '
                        enctype="multipart/form-data">

                    @if(isset($unit["id"]) && $unit["id"] > 0)
                        @method("put")
                    @endif

                    <x-fields.component-input-insert
                            title-en="name"
                            title-fa="عنوان واحد"
                            :value="isset($unit['name']) ? $unit['name'] : ''" />


                </x-fields.component-from-data>




            </section>

        </section>
    </section>

@endsection