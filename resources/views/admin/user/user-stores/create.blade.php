@extends("admin.layouts.master")
@section("titlePage" , "ادمین- اطلاعات فروشگاه")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0">
        <section class="main-body-container col-12 my-2">

            <section class="main-body-container-header">
                <h5>
                    اطلاعات فروشگاه
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.users.user-store.index")}}" class="btn btn-info btn-sm">
                    بازگشت
                </a>

            </section>

            @if(isset($userStore["id"]) && $userStore["id"] > 0)
                <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                    <x-row-tables.admin.component-info-user
                            :user-id='$userStore -> user->id'
                            :user-full-name="$userStore -> user -> fullName"/>

                </section>
            @endif

            <section class="mt-2">

                <x-fields.component-from-data
                        :action='(isset($userStore["id"]) && $userStore["id"] > 0) ? route("admin.users.user-store.update" , $userStore["id"]) : route("admin.users.user-store.store") '>

                    @if(isset($userStore["id"]) && $userStore["id"] > 0)
                        @method("put")
                    @else
                        <x-fields.component-input-insert
                                title-en="user_email"
                                title-fa="ایمیل کاربر"
                                value=""/>
                    @endif



                    <x-fields.component-input-insert
                            title-en="name"
                            title-fa="عنوان فروشگاه"
                            :value="isset($userStore['name']) ? $userStore['name'] : ''" />

                    <x-fields.component-input-insert
                            title-en="phone"
                            title-fa="شماره فروشگاه"
                            :value="isset($userStore['phone']) ? $userStore['phone'] : ''" />

                    <x-fields.component-input-insert
                            title-en="address"
                            title-fa="ادرس فروشگاه"
                            :value="isset($userStore['address']) ? $userStore['address'] : ''" />


                </x-fields.component-from-data>




            </section>

        </section>
    </section>

@endsection