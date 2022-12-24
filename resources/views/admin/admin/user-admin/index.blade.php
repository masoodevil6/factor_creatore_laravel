@extends("admin.layouts.master")
@section("titlePage" , "ادمین- لیست ادمین ها")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="main-body-container-header">
                <h5>
                    لیست ادمین ها
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.panel.user-admin.create")}}" class="btn btn-info btn-sm">
                    افزودن ادمین جدید
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
                        <th scope="col" class="w-20  font-size-12">کاربر</th>
                        <th scope="col" class="w-20  font-size-12">ایمیل</th>
                        <th scope="col" class="w-20  font-size-12">پنل</th>
                        <th scope="col" class="w-10  font-size-12">وضعیت</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($AdminUsers As $key => $itemUserAdmin)
                        <x-row-tables.admin.component-item-user-admin
                                :user-admin-key='$key+1'
                                :user-admin-status="$itemUserAdmin['status']"
                                :admin-title="$itemUserAdmin['admin_title']"
                                :user-id="$itemUserAdmin['user_id']"
                                :user-email="$itemUserAdmin['user_email']"
                                :user-name="$itemUserAdmin['user_name']"/>
                    @endforeach
                    </tbody>

                </table>

            </section>

        </section>
    </section>


@endsection