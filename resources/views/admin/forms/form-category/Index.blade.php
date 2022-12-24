@extends("admin.layouts.master")
@section("titlePage" , "ادمین- لیست دسته بندی فرم ها")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="main-body-container-header">
                <h5>
                    لیست دسته بندی فرم ها
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.forms.form-category.create")}}" class="btn btn-info btn-sm">
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
                        <th scope="col" class="w-70  font-size-12">عنوان دسته</th>
                        <th scope="col" class="w-10  font-size-12">وضعیت</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($formCategories As $key => $itemFormCategory)
                        <x-row-tables.admin.component-item-form-category-admin
                                :form-category-key='$key+1'
                                :form-category-id="$itemFormCategory -> id"
                                :form-category-title="$itemFormCategory -> title"
                                :form-category-status="$itemFormCategory -> status"/>
                    @endforeach
                    </tbody>

                </table>

            </section>

        </section>
    </section>


@endsection