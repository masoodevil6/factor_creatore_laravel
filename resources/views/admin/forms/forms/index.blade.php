@extends("admin.layouts.master")
@section("titlePage" , "ادمین- لیست فرم ها")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="main-body-container-header">
                <h5>
                    لیست فرم ها
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.forms.form.create")}}" class="btn btn-info btn-sm">
                    دسته بندی فرم جدید
                </a>

                <div class="mx-2">
                    <input type="text" placeholder="جستجو ..." class="form-control form-control-sm form-text">
                </div>

            </section>

            <section id="table-list-products" class="table-responsive">

                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="w-15  font-size-12">عنوان فرم</th>
                        <th scope="col" class="w-15  font-size-12">تصویر فرم</th>
                        <th scope="col" class="w-15  font-size-12">دسته</th>
                        <th scope="col" class="w-20  font-size-12">کلاس</th>
                        <th scope="col" class="w-10  font-size-12">وضعیت</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($forms As $key => $itemForm)
                        <x-row-tables.admin.component-item-form-admin
                                :form-key='$key+1'
                                :form-id="$itemForm -> id"
                                :form-name="$itemForm -> name"
                                :form-image="$itemForm -> image"
                                :form-category="$itemForm -> form_category_id == null ? $itemForm ->formCategory->title : '-'"
                                :form-class="$itemForm -> class_name"
                                :form-status="$itemForm -> status"/>
                    @endforeach
                    </tbody>

                </table>

            </section>

        </section>
    </section>


@endsection