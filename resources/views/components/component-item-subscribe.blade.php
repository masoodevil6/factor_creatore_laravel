@foreach($subscribes as $itemSubscribe)
    <a href="{{route("customer.subscribes.info" , $itemSubscribe["slug"])}}" class="text-decoration-none d-block text-dark m-0 p-0 border border-dark my-3 w-100 m-0 shadow bg-white font-size-md cursor-pointer pb-1">
        <p  class="font-size-lg border-bottom border-dark col-12 color-family-1 text-white px-2 p-1 m-0 ">
            نام اشتراک:
            <span class="font-weight-bold mr-2 ">
                {{$itemSubscribe["title"]}}
            </span>
        </p>

        <section class="col-12  ">

            <div class="m-1 max-height-100px hidden-end-text text-justify">
                {!! $itemSubscribe["description"] !!}
            </div>

            @if(isset($itemSubscribe["active"]) && $itemSubscribe["active"])
                <p class="bg-success text-white rounded mb-1 font-size-lg my-2 d-inline-block px-2">
                    <i class="fa fa-check font-size-xlg mx-2"></i>
                    در حال حاضر، اشتراک فوق برای شما فعال می باشد
                </p>
            @endif

            <section class="col-12 row  justify-content-lg-between">
                <section class="col-12 col-lg-6 p-0">

                    <section class="row border bg-danger rounded mx-1 font-size-lg text-white  shadow">
                        <section class="col-3 text-center border-left border-white font-weight-bold line-height-30 font-size-md p-0">
                            {{$itemSubscribe["duration_text"]}}
                        </section>
                        <section class="col-9 row p-0 m-0 ">
                            <section class="col-2 border-left border-right border-white  bg-dark  m-0 p-0">
                                <i class="fa fa-money line-height-30 text-center d-block"></i>
                            </section>

                            @if($itemSubscribe["total_price"] > 0)
                                @if($itemSubscribe["off_price"] > 0)
                                    <section class="col-4 text-center bg-dark text-white border-left border-right border-white text_decoration_price line-height-30">
                                        {{$itemSubscribe["real_price_text"]}}
                                    </section>
                                    <section class="col-6 text-center bg-success rounded-left border-right border-white">
                                        <span class="line-height-30 font-weight-bold">
                                            {{$itemSubscribe["total_price_text"]}}
                                        </span>
                                    </section>
                                @else
                                    <section class="col-10 text-center bg-success rounded-left border-right border-white">
                                        <span class="line-height-30 font-weight-bold ">
                                            {{$itemSubscribe["total_price_text"]}}
                                        </span>
                                    </section>
                                @endif
                            @else
                                <section class="col-10 text-center bg-success rounded-left border-right border-white">
                                    <span class="line-height-30 font-weight-bold  ">
                                        رایگان
                                    </span>
                                </section>
                            @endif



                        </section>
                    </section>

                </section>



                <section class="col-12 col-lg-4">

                    @if(!$itemSubscribe["active"] || !isset($itemSubscribe["active"]))
                        <p class="p-1 m-0  my-2 my-lg-0  text-center btn btn-info font-size-md  border border-dark text-hover-white  float-left px-2">
                            فعال سازی
                            <i class="fa fa-check mr-1"></i>
                        </p>
                    @elseif(isset($itemSubscribe["active"]) && $itemSubscribe["active"])

                        <span class="p-1 m-0  my-2 my-lg-0  text-center btn btn-info font-size-md  border border-dark text-hover-white  float-left px-2">
                            مشاهده اطلاعات
                            <i class="fa fa-eye mr-1"></i>
                        </span>

                    @endif

                </section>

            </section>


        </section>


        @if(sizeof($itemSubscribe["forms"]) > 0)

            <p class="col-12 text-white mx-0 mt-1 mb-0 blue-gray-200">
                چند نمونه:
            </p>

            <section class="col-12  border-top  row m-0">


                @foreach($itemSubscribe["forms"] As $itemForm)
                    <section class="col-6 col-md-4 col-lg-2 p-1 ">

                        <section class="p-1 border border-dark d-block rounded m-auto p-1 shadow ">
                            <p class="m-0 text-center bg-warning rounded mb-1">
                                {{$itemForm["name"]}}
                            </p>
                            <img class="m-auto d-block " height="100" src="{{asset($itemForm["image"])}}" alt="">
                        </section>

                    </section>
                @endforeach


            </section>
        @endif


    </a>
@endforeach




