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
                                {{$itemClass["name"]}}
                            </option>
                        @endforeach

                    </x-fields.component-select-options>


                    <x-fields.component-input-insert
                            title-en="product_num"
                            title-fa="تعداد کالاها"
                            type="number"
                            value="8" />


                </x-fields.component-from-data>

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