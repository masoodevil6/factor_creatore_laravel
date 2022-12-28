@extends("admin.layouts.master")
@section("titlePage" , "ادمین- تراکنش های اشتراک ها")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="main-body-container-header">
                <h5>
                    لیست تراکنش ها
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.subscribes.subscribe-payment.create")}}" class="btn btn-info btn-sm">
                    اشتراک برای کاربر
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
                        <th scope="col" class="w-15  font-size-12">اشتراک</th>
                        <th scope="col" class="w-15  font-size-12">کاربر</th>
                        <th scope="col" class="w-15  font-size-12">مبلغ</th>
                        <th scope="col" class="w-15  font-size-12">شماره رزرو</th>
                        <th scope="col" class="w-10  font-size-12">وضعیت</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($subscribePayments As $key => $itemSubscribePayment)
                        <x-row-tables.admin.component-item-subscribe-payment
                                :subscribe-payment-key="$key+1"
                                :subscribe-payment-id="$itemSubscribePayment -> id"
                                :subscribe-payment-title="$itemSubscribePayment -> subscribe -> title"
                                :subscribe-payment-user="$itemSubscribePayment -> user -> fullName"
                                :subscribe-payment-amount="$itemSubscribePayment -> amount"
                                :subscribe-payment-res-num="$itemSubscribePayment -> res_num"
                                :subscribe-payment-status="$itemSubscribePayment -> status"/>
                    @endforeach
                    </tbody>

                </table>

            </section>

        </section>
    </section>


@endsection