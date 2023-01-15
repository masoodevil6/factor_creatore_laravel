@extends("admin.layouts.master")
@section("titlePage" , "ادمین- تست فایل فاکتور فرم")


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
                        :action='route("admin.forms.form.submit-test-file")'
                        >


                    <x-fields.component-select-options
                            title-en="class_name"
                            title-fa="کلاس فرم">

                        <option disabled> کلاس فرم مورد نظر را انتخاب نمایید </option>

                        @foreach($classes as $itemClass)
                            <option value="{{$itemClass["name"]}}" @if(isset($forms["class"]) && $itemClass["namespace"]==$forms["class"]) selected @endif>
                                {{$itemClass["name_fa"]}}
                                -
                                [
                                {{$itemClass["name"]}}
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
                            <option value="{{$itemInfo["size"]}}">
                                {{\Illuminate\Support\Str::upper($itemInfo["size"])}}
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
                            <th scope="col" class="w-25  font-size-12 text-center">سایز</th>
                            <th scope="col" class=" font-size-12 text-center">تعداد کالاها در هر صفحه</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($formInfo["page"] As $key => $itemInfo)
                            <tr>
                                <td class="font-size-12">
                                    {{$key}}
                                </td>
                                <td class="font-size-12 text-center">
                                    {{\Illuminate\Support\Str::upper($itemInfo["size"])}}
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
    //prevent-submit="1"
    <script>
        function submitFormDataGroup() {

            $("form[id=form-data-group]").submit();

            setTimeout(function () {
                window.location.reload();
            },5000);
        }
    </script>
@endsection