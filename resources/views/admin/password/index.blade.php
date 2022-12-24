@extends("admin.layouts.master")
@section("titlePage" , "ادمین- تغییر پسورد")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0">
        <section class="main-body-container col-12 my-2">

            <section class="main-body-container-header">
                <h5>
                    تغییر رمز عبور پنل
                </h5>
            </section>


            <section class="mt-2">

                <x-fields.component-from-data
                        :action='route("admin.password.send-token")'>

                    <section class="col-12 row border-bottom border-dark mx-0 pb-2">
                        <x-fields.component-input-insert
                                title-en="last_password"
                                title-fa="رمز سابق"
                                type="password"
                                value="" />
                    </section>

                    <section class="col-12 row mt-2 mx-0  pb-2">
                        <x-fields.component-input-insert
                                title-en="password"
                                title-fa="رمز جدید"
                                type="password"
                                value="" />
                        <x-fields.component-input-insert
                                title-en="password_confirmation"
                                title-fa="تکرار رمز جدید"
                                type="password"
                                value="" />
                    </section>


                </x-fields.component-from-data>

            </section>

        </section>
    </section>

@endsection