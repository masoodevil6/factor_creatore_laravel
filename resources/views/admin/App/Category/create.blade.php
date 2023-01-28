@extends("admin.layouts.master")
@section("titlePage" , "ادمین- اطلاعات دسته بندی برنامه")


@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.apps.category.index")}}" class="btn btn-info btn-sm">
                    بازگشت
                </a>

            </section>


            <section class="mt-3 border-bottom">

                <x-fields.component-from-data
                        :action='(isset($appCategory["id"]) && $appCategory["id"] > 0) ? route("admin.apps.category.update" , $appCategory->id ) : route("admin.apps.category.store" ) '>

                    @if(isset($appCategory["id"]) && $appCategory["id"] > 0)
                        @method("put")
                    @endif

                    <x-fields.component-input-insert
                            title-en="name"
                            title-fa="عنوان دسته بندی برنامه"
                            :value="isset($appCategory['name']) ? $appCategory['name'] : ''" />


                </x-fields.component-from-data>


            </section>

        </section>
    </section>


@endsection


@section("footer-tag")

@endsection