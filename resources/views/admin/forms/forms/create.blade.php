@extends("admin.layouts.master")
@section("titlePage" , "ادمین- اطلاعات فرم")


@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.forms.form.index")}}" class="btn btn-info btn-sm">
                    بازگشت
                </a>

            </section>


            <section class="mt-3 border-bottom">

                <x-fields.component-from-data
                        :action='(isset($form["id"]) && $form["id"] > 0) ? route("admin.forms.form.update" , $form->id ) : route("admin.forms.form.store" )'
                        enctype="multipart/form-data">

                    @if(isset($form["id"]) && $form["id"] > 0)
                        @method("put")
                    @endif


                    <x-fields.component-input-insert
                            title-en="name"
                            title-fa="عنوان فرم"
                            :value="isset($form['name']) ? $form['name'] : ''" />


                        <x-fields.component-select-options
                                title-en="form_category_id"
                                title-fa="دسته بندی">

                            @foreach($formCategories as $itemFormCategory)
                                <option value="{{$itemFormCategory->id}}" @if(isset($form["form_category_id"]) && $itemFormCategory["id"] == $form["form_category_id"]) selected @endif>
                                    {{$itemFormCategory -> title}}
                                </option>
                            @endforeach


                        </x-fields.component-select-options>


                        <x-fields.component-select-options
                                title-en="class_name"
                                title-fa="کلاس فرم">

                            <option disabled> کلاس فرم مورد نظر را انتخاب نمایید </option>

                            @foreach($classes as $itemClass)
                                <option value="{{$itemClass["name"]}}" @if(isset($forms["class"]) && $itemClass["namespace"]==$forms["class"]) selected @endif>
                                    {{$itemClass["name"]}}
                                </option>
                            @endforeach


                        </x-fields.component-select-options>


                        <x-fields.component-upload-image
                                title-en="image"
                                title-fa="تصویر" >

                            @if(isset($forms["image"]) && $forms["location"] != "")
                                <img class="d-block m-auto" src="{{asset($forms->image->location["indexArray"][$singerImage->image->location["currentImage"]])}}" height="150" alt="تصویر">
                            @endif

                        </x-fields.component-upload-image>


                        <x-fields.component-select-options
                                title-en="status"
                                title-fa="وضعیت">

                            <option value="0" @if(isset($forms["status"]) && $forms["status"]==0) selected @endif>غیر فعال </option>
                            <option value="1" @if(isset($forms["status"]) && $forms["status"]==1) selected @endif> فعال </option>

                        </x-fields.component-select-options>


                </x-fields.component-from-data>


            </section>

        </section>
    </section>


@endsection


@section("footer-tag")

@endsection