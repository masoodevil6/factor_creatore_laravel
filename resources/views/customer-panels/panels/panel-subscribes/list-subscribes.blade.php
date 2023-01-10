@if(sizeof($userSubscribes) > 0)
    <section class="border border-dark shadow bg-white mt-2 ">

        <section class="border-bottom border-dark color-family-1 text-center text-white">
            اشتراک ها
        </section>

        <section id="form_list_main_tickets" class="mx-5 mx-lg-2 my-3 row ">

            @foreach($userSubscribes As $key => $itemSubscribe)

                <section class="col-12 p-0 ">
                    <section  class="item-panel border border-dark m-2  shadow font-size-md position-relative">
                        <section class="d-lg-flex d-block d-inline border-bottom border gray-300">
                            <section class="col-12 col-lg-4 border-lg-left border-white gray-100 font-weight-bold">
                                شماره
                            </section>
                            <section class="col-12 col-lg-8 ">
                                {{$key + 1}}
                            </section>
                        </section>

                        <section class="d-lg-flex d-block border-bottom border blue-gray-300 text-white border-white">
                            <section class="col-12 col-lg-4 border-lg-left blue-gray-200 font-weight-bold">
                                عنوان اشتراک
                            </section>
                            <section class="col-12 col-lg-8 ">
                                {{$itemSubscribe->title}}
                                [
                                {{$itemSubscribe->duration}}
                                ماهه
                                ]
                            </section>
                        </section>

                        <section class="d-lg-flex d-block border-bottom border gray-300 ">
                            <section class="col-12 col-lg-4 border-lg-left  border-white gray-100 font-weight-bold">
                                مبلغ پرداختی
                            </section>
                            <section class="col-12 col-lg-8 ">
                                {{persianPriceFormat($itemSubscribe->amount)}}
                                تومان
                            </section>
                        </section>

                        <section class="d-lg-flex d-block border-bottom border blue-gray-300 text-white border-white">
                            <section class="col-12 col-lg-4 border-lg-left blue-gray-200 font-weight-bold">
                                وضعیت پرداخت
                            </section>
                            <section class="col-12 col-lg-8 ">
                                {{$itemSubscribe->status["title"]}}
                            </section>
                        </section>

                        <section class="d-lg-flex d-block border-bottom border gray-300 ">
                            <section class="col-12 col-lg-4 border-lg-left  border-white gray-100 font-weight-bold">
                                شروع اشتراک
                            </section>
                            <section class="col-12 col-lg-8 ">
                                {{jalaliDate($itemSubscribe->time_start)}}
                            </section>
                        </section>
                        <section class="d-lg-flex d-block border-bottom border blue-gray-300 text-white border-white">
                            <section class="col-12 col-lg-4 border-lg-left blue-gray-200 font-weight-bold">
                                پایان اشتراک
                            </section>
                            <section class="col-12 col-lg-8 ">
                                {{jalaliDate($itemSubscribe->time_end)}}
                            </section>
                        </section>


                        <section onclick="selectUserSubscribeInfo({{$itemSubscribe->id}})" title="مشاهده" class="btn-one btn-panel cursor-pointer position-absolute bg-warning border border-dark rounded shadow">
                            <i class="fa fa-eye position-absolute"></i>
                        </section>

                        @if($itemSubscribe->status["id"] == 0)

                            <form  method="post" action="{{route("customer-panel.subscribes.delete-user-subscribe" , $itemSubscribe->id)}}" >
                                @csrf
                                @method("delete")

                                <section onclick="goToConfirmDeleteForm(this)" title="حذف" class="btn-two btn-panel cursor-pointer position-absolute bg-danger border border-dark rounded shadow">
                                    <i class="fa fa-trash position-absolute text-white"></i>
                                </section>
                            </form>

                            @if($itemSubscribe->active)

                                <a href="#" title="پرداخت" class="btn-three btn-panel  cursor-pointer position-absolute bg-info border border-dark rounded shadow">
                                    <i class="fa fa-credit-card position-absolute text-white"></i>
                                </a>

                            @endif

                        @endif

                    </section>
                </section>

            @endforeach

        </section>

    </section>
@else

    <section class="mt-2">
        <x-component-not-exist-item
                title="اشتراکی"/>
    </section>

@endif
