<h1 class="border-bottom  my-2 mt-4 font-size-xlg">
    اشتراک:
    <span class="mr-2 font-weight-bold">
       {{$subscribe->title}}
    </span>
</h1>

<section class="d-block text-dark m-0 p-0 border border-dark my-2 w-100 m-0 shadow bg-white font-size-md  pb-1">
    <div class="m-1 max-height-100px hidden-end-text text-justify">
        {!! $subscribe->description !!}
    </div>

    <section class="col-12 row  justify-content-lg-between">
        <section class="col-12 col-lg-6 p-0">

            <section class="row border bg-danger rounded mx-1 font-size-lg text-white  shadow">
                <section class="col-3 text-center border-left border-white font-weight-bold line-height-30 font-size-md p-0">
                    {{$subscribe->duration_text}}
                </section>
                <section class="col-9 row p-0 m-0 ">
                    <section class="col-2 border-left border-right border-white  bg-dark  m-0 p-0">
                        <i class="fa fa-money line-height-30 text-center d-block"></i>
                    </section>

                    @if($subscribe->total_price > 0)
                        @if($subscribe->off_price > 0)
                            <section class="col-4 text-center bg-dark text-white border-left border-right border-white text_decoration_price line-height-30">
                                {{$subscribe->real_price_text}}
                            </section>
                            <section class="col-6 text-center bg-success rounded-left border-right border-white">
                                <span class="line-height-30 font-weight-bold">
                                    {{$subscribe->total_price_text}}
                                </span>
                            </section>
                        @else
                            <section class="col-10 text-center bg-success rounded-left border-right border-white">
                                <span class="line-height-30 font-weight-bold ">
                                    {{$subscribe->total_price_text}}
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

            @if($subscribe->active)
                <p class="bg-success text-white rounded mb-1 font-size-lg">
                    <i class="fa fa-check font-size-xlg mx-2"></i>
                    در حال حاضر، اشتراک فوق برای شما فعال می باشد
                </p>
            @else
                <a href="#" class="text-decoration-none p-1 m-0 my-2 my-lg-0 shadow text-center btn btn-info font-size-md  border border-dark  text-hover-white  float-left px-2 font-weight-bold font-size-md ">
                    خرید و فعال سازی
                    <i class="fa fa-check mr-1 border border-white rounded p-1"></i>
                </a>
            @endif


        </section>

    </section>
</section>