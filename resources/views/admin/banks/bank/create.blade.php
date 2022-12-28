@extends("admin.layouts.master")
@section("titlePage" , "ادمین- اطلاعات بانک")


@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.banks.bank.index")}}" class="btn btn-info btn-sm">
                    بازگشت
                </a>

            </section>


            <section class="mt-3 border-bottom">

                <x-fields.component-from-data
                        :action='(isset($bank["id"]) && $bank["id"] > 0) ? route("admin.banks.bank.update" , $bank->id ) : route("admin.banks.bank.store" ) '>

                    @if(isset($bank["id"]) && $bank["id"] > 0)
                        @method("put")
                    @endif

                    <x-fields.component-input-insert
                            title-en="title"
                            title-fa="عنوان دسته"
                            :value="isset($bank['title']) ? $bank['title'] : ''" />

                    <x-fields.component-select-options
                            title-en="status"
                            title-fa="وضعیت">

                        <option value="0" @if(isset($bank["status"]) && $bank["status"]==0) selected @endif>غیر فعال </option>
                        <option value="1" @if(isset($bank["status"]) && $bank["status"]==1) selected @endif> فعال </option>

                    </x-fields.component-select-options>


                </x-fields.component-from-data>


            </section>

        </section>
    </section>


@endsection


@section("footer-tag")

@endsection