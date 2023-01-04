@if(sizeof($subscribeSelected) > 0)
    <p class="border-bottom font-weight-bold my-2 mt-4">
        اشتراک های منتخب
    </p>

    @foreach($subscribeSelected as $itemSubscribe)
        <a href="#" class="text-decoration-none d-block text-dark m-0 p-0 border border-dark my-2 w-100 m-0 shadow bg-white font-size-md cursor-pointer pb-1">
            <p  class="font-size-lg border-bottom border-dark col-12 color-family-1 text-white px-2 p-1 m-0 ">
                نام اشتراک:
                <span class="font-weight-bold mr-2 ">
                    {{$itemSubscribe["title"]}}
                </span>
            </p>

            <section class="col-12  ">

                <div class="m-1">
                    {!! $itemSubscribe["description"] !!}
                </div>

                <section class="col-12 ">
                    <p class="p-1 m-0  text-center btn btn-info font-size-md  border border-dark text-hover-white  justify-content-start">
                        فعال سازی
                        <i class="fa fa-check mr-1"></i>
                    </p>
                </section>
            </section>

            <p class="col-12 text-white mx-0 mt-1 mb-0 blue-gray-200">
                چند نمونه:
            </p>

            <section class="col-12  border-top  row m-0">


                @foreach($itemSubscribe["forms"] As $itemForm)
                    <section class="col-4 col-lg-2 p-1 ">

                        <section class="p-1 border border-dark d-block rounded m-auto p-1 shadow ">
                            <p class="m-0 text-center bg-warning rounded mb-1">
                                {{$itemForm["name"]}}
                            </p>
                            <img class="m-auto d-block " height="100" src="{{$itemForm["image"]}}" alt="">
                        </section>

                    </section>
                @endforeach


            </section>

        </a>
    @endforeach

@endif



