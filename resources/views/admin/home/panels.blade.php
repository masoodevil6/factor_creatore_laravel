





<section class="row p-0 m-0 ">
    <section class="main-body-container col-12 my-2 px-2 ">


        <section class="body-content d-flex pb-2 border-bottom">

            <p class="text-right font-size-lg m-0 rounded px-2">
                پنل ها

                @if($panelSearch != "")
                    [
                    نتایج جستجو
                <span class="bg-info px-2 mx-2 rounded text-white">
                    "
                    {{$panelSearch}}
                    "
                    <a href="{{route("admin.home")}}" class="mr-2 text-white pointer">
                        <i class="fa fa-close"></i>
                    </a>
                </span>
                    ]
                @endif
            </p>

        </section>

        <section class="row">

            @foreach($panels As $itemGroup)

                <section class="col-12 col-md-3 my-2">

                    <div class="border border-dark d-block h-100">
                        <p class="bg-grey text-white text-center d-block font-size-md m-0 p-0">
                            {{$itemGroup["group_title"]}}
                        </p>

                        @foreach($itemGroup["panels"] As $itemPanel)

                            <div class="list-group p-0">
                                <a href="{{route($itemPanel["panel_link"])}}" class="list-group-item py-0 list-group-item-action pointer list-group-item-light">
                                    <i class="{{$itemPanel["panel_icon"]}} w-25 text-center line-height-30 float-right text-dark"></i>
                                    <p class="text-right w-75 line-height-30 float-right px-2 py-0 m-0 text-dark"> {{$itemPanel["panel_name"]}} </p>
                                </a>
                            </div>

                        @endforeach

                    </div>

                </section>

            @endforeach



        </section>


    </section>




</section>
