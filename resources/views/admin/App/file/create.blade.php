@extends("admin.layouts.master")
@section("titlePage" , "ادمین- اطلاعات فایل برنامه")


@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.apps.file.index")}}" class="btn btn-info btn-sm">
                    بازگشت
                </a>

            </section>


            <section class="mt-3 border-bottom">



                <x-fields.component-from-data
                        :action='(isset($appFile["id"]) && $appFile["id"] > 0) ? route("admin.apps.file.update" , $appFile->id ) : route("admin.apps.file.store" )'
                        enctype="multipart/form-data">

                    @if(isset($appFile["id"]) && $appFile["id"] > 0)
                        @method("put")
                    @endif

                    <x-fields.component-input-insert
                            title-en="name"
                            title-fa="عنوان فایل برنامه"
                            :value="isset($appFile['name']) ? $appFile['name'] : ''" />

                    <x-fields.component-input-insert
                            title-en="version"
                            title-fa="نسخه فایل برنامه"
                            :value="isset($appFile['version']) ? $appFile['version'] : ''" />



                        <x-fields.component-select-options
                                title-en="app_category_id"
                                title-fa=" دسته بندی برنامه">

                            @foreach($appCategories as $itemAppCategory)
                                <option value="{{$itemAppCategory->id}}" @if(isset($appFile["app_category_id"]) && $itemAppCategory["id"] == $appFile["app_category_id"]) selected @endif>
                                    {{$itemAppCategory -> name}}
                                </option>
                            @endforeach


                        </x-fields.component-select-options>



                        <x-fields.component-upload-image
                                title-en="file_app"
                                title-fa="فایل برنامه"
                                value="$appFile->address" />


                </x-fields.component-from-data>


            </section>


            <section class="mt-3 border-bottom">


                @if(isset($appFile["id"]) && $appFile["id"] > 0)
                    <section class="mt-5 border-bottom row p-0 m-0">

                        <section class="col-12 gray-400 text-white text-center">
                            اطلاعات فایل
                        </section>

                        <x-fields.component-row-data
                                title='سایز'
                                :value='$appFile -> size  '/>

                        <x-fields.component-row-data
                                title='فرمت'
                                :value='$appFile -> format  '/>

                        <x-fields.component-row-data
                                title='فرمت'
                                :href="asset($appFile->address)"
                                value='دانلود'/>


                    </section>
                @endif
            </section>

        </section>


    </section>


@endsection


@section("footer-tag")

@endsection