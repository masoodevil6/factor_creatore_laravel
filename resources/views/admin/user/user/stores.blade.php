@extends("admin.layouts.master")
@section("titlePage" , "ادمین- لیست فروشگاه های کاربر")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="main-body-container-header">
                <h5>
                    لیست فروشگاه های کاربر
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.users.user.index")}}" class="btn btn-info btn-sm">
                    بازگشت
                </a>

                <div class="mx-2">
                    <input type="text" placeholder="جستجو ..." class="form-control form-control-sm form-text">
                </div>

            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <x-row-tables.admin.component-info-user
                        :user-id='$user->id'
                        :user-full-name="$user -> fullName"/>

            </section>

            <section id="table-list-products" class="table-responsive">

                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="w-15  font-size-12">فروشگاه</th>
                        <th scope="col" class="w-15  font-size-12">تلفن</th>
                        <th scope="col" class="w-15  font-size-12">کاربر</th>
                        <th scope="col" class="w-25  font-size-12">آدرس</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($userStores As $key => $itemUserStore)
                        <x-row-tables.admin.component-item-user-store-admin
                                :user-Store-key='$key+1'
                                :user-Store-id="$itemUserStore -> id"
                                :user-Store-name="$itemUserStore -> name"
                                :user-Store-phone="$itemUserStore -> phone"
                                :user-Store-address="$itemUserStore -> address"
                                :user-Store-user="$itemUserStore -> user"/>
                    @endforeach
                    </tbody>

                </table>

            </section>

        </section>
    </section>


@endsection