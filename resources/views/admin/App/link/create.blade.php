@extends("admin.layouts.master")
@section("titlePage" , "ادمین- اطلاعات لینک فایل برنامه")


@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.apps.link.index")}}" class="btn btn-info btn-sm">
                    بازگشت
                </a>

            </section>


            <section class="mt-3 border-bottom">



                <x-fields.component-from-data
                        :action='(isset($appFileLink["id"]) && $appFileLink["id"] > 0) ? route("admin.apps.link.update" , $appFileLink->id ) : route("admin.apps.link.store" )'
                        enctype="multipart/form-data">

                    @if(isset($appFileLink["id"]) && $appFileLink["id"] > 0)
                        @method("put")
                    @endif

                    <x-fields.component-input-insert
                            title-en="name"
                            title-fa="عنوان لینک فایل"
                            :value="isset($appFileLink['name']) ? $appFileLink['name'] : ''" />

                    <x-fields.component-input-insert
                            title-en="address"
                            title-fa="آدرس فایل برنامه (می تواند خالی باشد)"
                            :value="isset($appFileLink['address']) ? $appFileLink['address'] : ''" />



                    <x-fields.component-select-options
                            title-en="app_category_id"
                            title-fa=" دسته بندی برنامه">

                        @foreach($appCategories as $itemAppCategory)
                            <option value="{{$itemAppCategory->id}}" @if(isset($appFileLink["app_category_id"]) && $itemAppCategory["id"] == $appFileLink["app_category_id"]) selected @endif>
                                {{$itemAppCategory -> name}}
                            </option>
                        @endforeach

                    </x-fields.component-select-options>



                    <x-fields.component-select-options
                            title-en="app_file_id"
                            title-fa="فایل (می تواند خالی باشد)">

                        <option value=""> (خالی) استفاده از لینک </option>

                        @foreach($appFiles as $itemAppFile)
                            <option value="{{$itemAppFile->id}}" @if(isset($appFileLink["app_file_id"]) && $itemAppFile["id"] == $appFileLink["app_file_id"]) selected @endif>
                                {{$itemAppFile -> name}}
                            </option>
                        @endforeach

                    </x-fields.component-select-options>



                        <x-fields.component-upload-image
                                title-en="image"
                                title-fa="تصویر" >

                            @if(isset($appFileLink["image"]) && $appFileLink["image"] != "")
                                <img class="d-block m-auto" src="{{asset($appFileLink["image"])}}" height="150" alt="تصویر">


                                <x-fields.component-button
                                        btn-type='custom'
                                        btn-color="btn-danger"
                                        btn-icon="fa fa-trash"
                                        :url='route("admin.apps.link.delete-image" , $appFileLink->id)'/>
                            @endif

                        </x-fields.component-upload-image>


                        <x-fields.component-select-options
                                title-en="status"
                                title-fa="وضعیت">

                            <option value="0" @if(isset($appFileLink["status"]) && $appFileLink["status"]==0) selected @endif>غیر فعال </option>
                            <option value="1" @if(isset($appFileLink["status"]) && $appFileLink["status"]==1) selected @endif> فعال </option>

                        </x-fields.component-select-options>



                </x-fields.component-from-data>


            </section>

        </section>


    </section>


@endsection


@section("footer-tag")

@endsection