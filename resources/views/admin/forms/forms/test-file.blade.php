@extends("admin.layouts.master")
@section("titlePage" , "ادمین- تست فایل فاکتور فرم")


@section("head-tag")
    <meta name="url-this-page" content="{{ route("admin.forms.form.test-file") }}" />
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
                        :action='route("admin.forms.form.submit-test-file")'>

                    <x-fields.component-select-options
                            title-en="class_name"
                            title-fa="فرم و کلاس"
                            :method="true">

                        <option disabled> فرم مورد نظر را انتخاب نمایید </option>

                        @foreach($forms as $itemForm)
                            <option data-id="{{$itemForm["id"]}}" value="{{$itemForm["form_name"]}}" @if($itemForm["id"]==$form["id"]) selected @endif>
                                [
                                فرم:
                                {{$itemForm["name"]}}
                                ]

                                ----------

                                [
                                کلاس:
                                {{$itemForm["form_name_fa"]}}-
                                {{$itemForm["form_name"]}}
                                ]
                            </option>
                        @endforeach

                    </x-fields.component-select-options>



                    <x-fields.component-input-insert
                            title-en="product_num"
                            title-fa="تعداد کالاها"
                            type="number"
                            value="8" />



                    <x-fields.component-select-options
                            title-en="size"
                            title-fa="سایز صفحه">

                        @foreach($formInfo["page"] As $key => $itemInfo)
                            <option value="{{$itemInfo["size"]["name"]}}">
                                {{\Illuminate\Support\Str::upper($itemInfo["size"]["name"])}}
                                - [
                                {{$itemInfo["num"]}}
                                عدد
                                ]
                            </option>
                        @endforeach

                    </x-fields.component-select-options>


                </x-fields.component-from-data>

            </section>


            <section class="row mt-3 border-bottom">

                <section class="col-12 body-content d-flex justify-content-between pb-2">

                    <h5>
                        اطلاعات فرم
                    </h5>

                </section>


                <section class="col-12 col-lg-6">
                    {!! $formInfo["description"] !!}
                </section>

                <section class="col-12 col-lg-6">
                    <table class="table table-striped">

                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="w-10  font-size-12 text-center">استاندارد</th>
                            <th scope="col" class="w-30  font-size-12 text-center">سایز</th>
                            <th scope="col" class=" font-size-12 text-center">تعداد کالاها در هر صفحه</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($formInfo["page"] As $key => $itemInfo)
                            <tr>
                                <td class="font-size-12">
                                    {{$key + 1}}
                                </td>
                                <td class="font-size-12 text-center">
                                    {{\Illuminate\Support\Str::upper($itemInfo["size"]["name"])}}
                                </td>
                                <td class="font-size-12 text-center">
                                    [
                                    {{$itemInfo["size"]["width"]}}
                                    *
                                    {{$itemInfo["size"]["height"]}}
                                    ]
                                </td>
                                <td class="font-size-12 text-center">
                                    {{$itemInfo["num"]}}
                                    عدد
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </section>


            </section>

        </section>
    </section>


@endsection


@section("footer-tag")
    <script>

        function changeValueclass_name(element) {
            var id = $(element).find(':selected').data('id');
            window.location.href = $('meta[name="url-this-page"]').attr('content')+"/"+id;
        }

    </script>
@endsection