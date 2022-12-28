@extends("admin.layouts.master")
@section("titlePage" , "ادمین- تراکنش اشتراک")


@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.subscribes.subscribe-payment.index")}}" class="btn btn-info btn-sm">
                    بازگشت
                </a>

            </section>



            <section class="mt-5 border-bottom row p-0 m-0">

                <section class="col-12 gray-400 text-white text-center">
                    اطلاعات کاربر
                </section>

                <x-row-tables.admin.component-info-user
                        :user-id='$subscribePayment -> user->id'
                        :user-full-name="$subscribePayment -> user -> fullName"/>


                <x-fields.component-row-data
                        title='نام کاربر'
                        :value='$subscribePayment-> user -> fullName  '/>

                <x-fields.component-row-data
                        title='شماره تماس'
                        :value='$subscribePayment-> user -> phone  '/>

                <x-fields.component-row-data
                        title='ایمیل'
                        :value='$subscribePayment-> user -> email  '/>

                <x-fields.component-row-data
                        title='زمان ثبت نام'
                        :value='jalaliDate($subscribePayment-> user -> created_at)  '/>


            </section>


            <section class="mt-5 border-bottom row p-0 m-0">

                <section class="col-12 gray-400 text-white text-center">
                    اطلاعات تراکنش
                </section>

                <x-fields.component-row-data
                        title='پرداخت/ادمین'
                        :value='$subscribePayment-> admin_add == 1 ? "اضافه شده توسط ادمین" : "پرداختی"  '/>

                <x-fields.component-row-data
                        title='شماره رزرو'
                        :value='$subscribePayment-> res_num  '/>

                <x-fields.component-row-data
                        title='شماره تراکنش'
                        :value='$subscribePayment-> ref_num  '/>

                <x-fields.component-row-data
                        title='مبلغ'
                        :value='persianPriceFormat($subscribePayment-> amount )." تـومان" '/>

                <x-fields.component-row-data
                        title='نام بانک'
                        :value='$subscribePayment->bank_id != null ? $subscribePayment-> bank -> title : "-"'/>

                <x-fields.component-row-data
                        title='شماره تلفن'
                        :value='$subscribePayment-> phone'/>

                <x-fields.component-row-data
                        title='ایمیل'
                        :value='$subscribePayment-> email'/>

                <x-fields.component-row-data
                        title='وضعیت پرداخت'
                        :value='$subscribePayment-> status["title"]'/>

                <x-fields.component-row-data
                        title='تاریخ اشتراک'
                        :value='jalaliDate($subscribePayment-> time_set , "%Y/%m/%d")'/>

            </section>


            <section class="mt-5 border-bottom row p-0 m-0">

                <section class="col-12 gray-400 text-white text-center">
                    اطلاعات اشتراک
                </section>

                <x-fields.component-row-data
                        title='عنوان'
                        :value='$subscribePayment-> subscribe -> title  '/>

                <x-fields.component-row-data
                        title='هزینه'
                        :value='persianPriceFormat( $subscribePayment-> subscribe -> real_price )." تـومان"   '/>

                <x-fields.component-row-data
                        title='تخفیف'
                        :value='persianPriceFormat( $subscribePayment-> subscribe -> off_price )." تـومان"   '/>

                <x-fields.component-row-data
                        title='هزینه نهایی'
                        :value='persianPriceFormat( $subscribePayment-> subscribe -> totalPrice )." تـومان"   '/>

                <x-fields.component-row-data
                        title='مدت'
                        :value='$subscribePayment-> subscribe -> duration == null ? "نامحدود" :   $subscribePayment-> subscribe -> duration." ماه" '/>

                <x-fields.component-row-data
                        title='دانلود'
                        :value='$subscribePayment-> subscribe -> download == null ? "نامحدود" :   $subscribePayment-> subscribe -> download." بار" '/>

                <x-fields.component-row-data
                        title='پخش'
                        :value='$subscribePayment-> subscribe -> play == null ? "نامحدود" :   $subscribePayment-> subscribe -> play." بار" '/>


            </section>

        </section>
    </section>


@endsection


@section("footer-tag")

@endsection