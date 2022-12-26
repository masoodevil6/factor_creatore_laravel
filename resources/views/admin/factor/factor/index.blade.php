@extends("admin.layouts.master")
@section("titlePage" , "ادمین- لیست فاکتورها")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="main-body-container-header">
                <h5>
                    لیست فاکتورها
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="#" class="btn btn-info btn-sm disabled">
                    دسته فاکتور جدید
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
                        <th scope="col" class="w-15  font-size-12">شماره رزرو</th>
                        <th scope="col" class="w-15  font-size-12">کاربر</th>
                        <th scope="col" class="w-15  font-size-12">فرم</th>
                        <th scope="col" class="w-15  font-size-12">تاریخ</th>
                        <th scope="col" class="w-15  font-size-12">وضعیت</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($factors As $key => $itemFactor)
                        <x-row-tables.admin.component-item-factor-admin
                                :factor-key='$key+1'
                                :factor-id="$itemFactor -> id"
                                :factor-res-num="$itemFactor -> res_num"
                                :factor-user="$itemFactor -> user"
                                :factor-form="$itemFactor -> form"
                                :factor-date="$itemFactor -> created_at"
                                :factor-status="$itemFactor -> status"/>
                    @endforeach
                    </tbody>

                </table>

            </section>

        </section>
    </section>


@endsection