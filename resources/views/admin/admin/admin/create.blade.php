@extends("admin.layouts.master")
@section("titlePage" , "ادمین- اطلاعات پنل")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0">
        <section class="main-body-container col-12 my-2">

            <section class="main-body-container-header">
                <h5>
                    پنل
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.panel.admin.index")}}" class="btn btn-info btn-sm">
                    بازگشت
                </a>

                @if(isset($admin["id"]) && $admin["id"] > 0)
                    <x-fields.component-button
                            btn-type='custom'
                            title='دسترسی ها'
                            btn-icon='fa fa-th-list'
                            :url='route("admin.panel.admin.panels" , $admin->id)'/>
                @endif
            </section>

            <section class="mt-2">

                <x-fields.component-from-data
                        :action='(isset($admin["id"]) && $admin["id"] > 0) ? route("admin.panel.admin.update" , $admin["id"]) : route("admin.panel.admin.store") '
                        enctype="multipart/form-data">

                    @if(isset($admin["id"]) && $admin["id"] > 0)
                        @method("put")
                    @endif

                    <x-fields.component-input-insert
                            title-en="title"
                            title-fa="عنوان پنل"
                            :value="isset($admin['title']) ? $admin['title'] : ''" />


                    <x-fields.component-select-options
                            title-en="status"
                            title-fa="وضعیت">

                        <option value="0" @if(isset($admin["status"]) && $admin["status"]==0) selected @endif>غیر فعال </option>
                        <option value="1" @if(isset($admin["status"]) && $admin["status"]==1) selected @endif> فعال </option>

                    </x-fields.component-select-options>


                </x-fields.component-from-data>




            </section>

        </section>
    </section>

@endsection