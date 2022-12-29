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

                <a href="{{route("admin.subscribes.subscribe-payment.create")}}" class="btn btn-info btn-sm  max-height-30">
                    اشتراک برای کاربر
                </a>

                <div class="mx-2 ">
                    <p class="text-center text-white font-size-12  bg-grey m-0 rounded">
                        فیلتر ها
                    </p>

                    <form action="{{ route("admin.subscribes.subscribe-payment.index") }}" method="get" class="border border-dark rounded p-1 d-flex">
                        <div class="d-block">
                            <div class="float-right mx-1">
                                <label for="filter-for-user" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                    کاربر
                                </label>
                                <input name="user" id="filter-for-user" type="text" value="{{$userSearch}}" placeholder="جستجو کاربر ..." class="form-control form-control-sm form-text">
                            </div>

                            <div class="float-right mx-1">
                                <label for="filter-for-res" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                    شماره رزرو
                                </label>
                                <input name="res" id="filter-for-res" type="text" value="{{$resSearch}}" placeholder="جستجو شماره رزرو ..." class="form-control form-control-sm form-text">
                            </div>

                            <div class="float-right mx-1">
                                <label for="filter-for-status" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                    وضعیت تیکت
                                </label>
                                <select name="status" id="filter-for-status" class="form-control form-control-sm form-text">

                                    <option value="-1" @if($statusSearch==-1) selected @endif> همه </option>
                                    <option value="0" @if($statusSearch==0) selected @endif> پرداخت نشده </option>
                                    <option value="1" @if($statusSearch==1) selected @endif> پرداخت شده </option>
                                </select>
                            </div>

                            <div class="float-right mx-1">
                                <label for="filter-for-sub" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                    اشتراک
                                </label>
                                <select name="sub" id="filter-for-sub" class="form-control form-control-sm form-text">

                                    <option value="0" @if($subscribeSearch==0) selected @endif> همه </option>
                                    @foreach($subscribes As $itemSubscribe)
                                        <option value="{{$itemSubscribe->id}}" @if($subscribeSearch==$itemSubscribe->id) selected @endif> {{$itemSubscribe->title}} </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>


                        <button type="submit"  class="btn btn-info round float-left font-size-md mt-1">
                            <i class="fa fa-search"></i>
                            جستجو
                        </button>
                    </form>
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