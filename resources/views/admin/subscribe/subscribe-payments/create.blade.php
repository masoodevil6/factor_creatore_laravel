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


            @if(isset($subscribePayment["id"]) && $subscribePayment["id"] > 0)
                <x-row-tables.admin.component-info-user
                        :user-id='$subscribePayment -> user->id'
                        :user-full-name="$subscribePayment -> user -> fullName"/>
            @endif




            <section class="mt-3 border-bottom">

                <x-fields.component-from-data
                        :action='(isset($subscribePayment["id"]) && $subscribePayment["id"] > 0) ? route("admin.subscribes.subscribe-payment.update" , $subscribePayment->id ) : route("admin.subscribes.subscribe-payment.store" ) '>

                    @if(isset($subscribePayment["id"]) && $subscribePayment["id"] > 0)
                        @method("put")
                    @endif

                        <x-fields.component-select-options
                                title-en="bank_id"
                                title-fa="بانک">
                            <option value @if(isset($subscribePayment["bank_id"]) && $subscribePayment["bank_id"] == null) selected @endif> دیگر </option>
                            @foreach($banks As $itemBank)
                                <option value="{{$itemBank["id"]}}" @if(isset($subscribePayment["bank_id"]) && $subscribePayment["bank_id"]== $itemBank["id"]) selected @endif> {{$itemBank["title"]}} </option>
                            @endforeach
                        </x-fields.component-select-options>


                        <x-fields.component-select-options
                                title-en="subscribe_id"
                                title-fa="اشتراک">
                            @foreach($subscribes As $itemSubscribe)
                                <option value="{{$itemSubscribe["id"]}}" @if(isset($subscribePayment["subscribe_id"]) && $subscribePayment["subscribe_id"]== $itemSubscribe["id"]) selected @endif> {{$itemSubscribe["title"]}} </option>
                            @endforeach
                        </x-fields.component-select-options>

                        @if(!isset($subscribePayment) || $subscribePayment['user_id'] == null)
                            <x-fields.component-input-insert
                                    title-en="user_email"
                                    title-fa="ایمیل کاربر"
                                    value="" />

                            <x-fields.component-select-options
                                    title-en="year"
                                    title-fa="سال">

                                @for($year = 1400; $year<= jalaliDate(now() , "Y") + 5 ;$year++)
                                    <option value="{{$year}}" class="@if($year == jalaliDate(now() , "Y") ) bg-success @endif" @if($year == jalaliDate(now() , "Y") ) selected @endif> {{$year}} </option>
                                @endfor

                            </x-fields.component-select-options>

                            <x-fields.component-select-options
                                    title-en="month"
                                    title-fa="ماه">

                                @for($mounth = 1; $mounth<= 12 ;$mounth++)
                                    <option value="{{$mounth}}" class="@if($mounth == jalaliDate(now() , "m") ) bg-success @endif" @if($mounth == jalaliDate(now() , "m") ) selected @endif> {{$mounth}} </option>
                                @endfor

                            </x-fields.component-select-options>


                        @else
                            <x-fields.component-row-data
                                    title='کاربر'
                                    :value='isset($subscribePayment) ? $subscribePayment-> user -> email : ""'/>

                            <x-fields.component-row-data
                                    title='تاریخ اشتراک'
                                    :value='empty($subscribePayment) ? jalaliDate($subscribePayment-> time_set) : ""'/>
                        @endif

                    <x-fields.component-input-insert
                            title-en="res_num"
                            title-fa="شماره رزرو"
                            :value="isset($subscribePayment['res_num']) ? $subscribePayment['res_num'] : ''" />

                    <x-fields.component-input-insert
                            title-en="ref_num"
                            title-fa="شماره تراکنش"
                            :value="isset($subscribePayment['ref_num']) ? $subscribePayment['ref_num'] : ''" />

                    <x-fields.component-input-insert
                            title-en="amount"
                            title-fa="مبلغ"
                            type="number"
                            :value="isset($subscribePayment['amount']) ? $subscribePayment['amount'] : ''" />

                    <x-fields.component-input-insert
                            title-en="phone"
                            title-fa="تلفن"
                            type="number"
                            :value="isset($subscribePayment['phone']) ? $subscribePayment['phone'] : ''" />


                </x-fields.component-from-data>


            </section>

        </section>
    </section>


@endsection


@section("footer-tag")

@endsection