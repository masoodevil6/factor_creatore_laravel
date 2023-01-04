@extends("admin.layouts.master")
@section("titlePage" , "ادمین- اطلاعات اشتراک")


@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.subscribes.subscribe.index")}}" class="btn btn-info btn-sm">
                    بازگشت
                </a>

            </section>


            <section class="mt-3 border-bottom">

                <x-fields.component-from-data
                        :action='(isset($subscribe["id"]) && $subscribe["id"] > 0) ? route("admin.subscribes.subscribe.update" , $subscribe->id ) : route("admin.subscribes.subscribe.store" ) '>

                    @if(isset($subscribe["id"]) && $subscribe["id"] > 0)
                        @method("put")
                    @endif

                    <x-fields.component-input-insert
                            title-en="title"
                            title-fa="عنوان اشتراک"
                            :value="isset($subscribe['title']) ? $subscribe['title'] : ''" />


                    <x-fields.component-input-insert
                            title-en="real_price"
                            title-fa="هزینه اشتراک"
                            type="number"
                            :value="isset($subscribe['real_price']) ? $subscribe['real_price'] : ''" />

                    <x-fields.component-input-insert
                            title-en="off_price"
                            title-fa="تخفیف اشتراک"
                            type="number"
                            :value="isset($subscribe['off_price']) ? $subscribe['off_price'] : ''" />

                    <x-fields.component-input-insert
                            title-en="duration"
                            title-fa="مدت اشتراک (ماه)"
                            type="number"
                            :value="isset($subscribe['duration']) ? $subscribe['duration'] : ''" />

                    <x-fields.component-select-options
                            title-en="status"
                            title-fa="وضعیت">

                        <option value="0" @if(isset($subscribe["status"]) && $subscribe["status"]==0) selected @endif>غیر فعال </option>
                        <option value="1" @if(isset($subscribe["status"]) && $subscribe["status"]==1) selected @endif> فعال </option>

                    </x-fields.component-select-options>

                    <x-fields.component-select-options
                            title-en="selected"
                            title-fa="منتخب">

                        <option value="0" @if(isset($subscribe["selected"]) && $subscribe["selected"]==0) selected @endif>غیر فعال </option>
                        <option value="1" @if(isset($subscribe["selected"]) && $subscribe["selected"]==1) selected @endif> فعال </option>

                    </x-fields.component-select-options>


                        <x-fields.component-sk-editor
                                title-en="description"
                                title-fa="توصیف"
                                :value="isset($subscribe['description']) ? $subscribe['description'] : ''" />



                </x-fields.component-from-data>


            </section>

        </section>
    </section>


@endsection


@section("footer-tag")

@endsection