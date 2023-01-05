<p class="border-bottom font-weight-bold my-2">
    درباره ما
</p>

<section class=" d-block text-dark m-0 p-0 border border-dark my-2 w-100 m-0 shadow bg-white font-size-md cursor-pointer pb-2">

    <section class="mb-2 pt-1 color-family-1">

        <p class="font-size-lg m-0 mr-2 font-weight-bold text-white">
            {{$settings["siteName"]["site_name_fa"]}}
        </p>

        <p class="font-size-md m-0 mr-4 font-weight-bold text-white">
            {{$settings["siteName"]["site_name_en"]}}
        </p>

    </section>

    <section class="mx-2 ">
        <div class="mr-2">
            {!! $settings["aboutUs"] !!}
        </div>
    </section>


    @if(isset($settings["infoSite"]["address"]) || isset($settings["infoSite"]["site_email"]) || isset($settings["infoSite"]["site_phone"]) || sizeof($settings["socials"]) > 0)

        <section class="mt-2 mx-2  border-dark border-top border-bottom">

            @if(isset($settings["infoSite"]["address"]))
                <section class="d-block">
                    <span class="mr-2 font-weight-bold float-right">
                        آدرس:
                    </span>
                    <span class="mr-2 d-inline-block">
                        {{$settings["infoSite"]["address"]}}
                    </span>
                </section>
            @endif


            @if(isset($settings["infoSite"]["site_email"]))
                <section class="d-block">
                    <span class="mr-2 font-weight-bold float-right">
                        ایمیل:
                    </span>
                    <span class="mr-2 d-inline-block">
                        {{$settings["infoSite"]["site_email"]}}
                    </span>
                </section>
            @endif


            @if(isset($settings["infoSite"]["site_phone"]))
                <section class="d-block">
                    <span class="mr-2 font-weight-bold float-right">
                        شماره تماس:
                    </span>
                    <span class="mr-2 d-inline-block">
                        {{$settings["infoSite"]["site_phone"]}}
                    </span>
                </section>
            @endif

            @if(sizeof($settings["socials"]) > 0)
                <section class="d-block">
                    <span class="mr-2 font-weight-bold float-right">
                        شبکه های اجتمایی
                    </span>
                    <div class="mr-2 d-inline-block">

                        @foreach($settings["socials"] As $key => $itemSocials)
                            <a href="{{$itemSocials["url"]}}" title="{{$itemSocials["title"]}}" class=" text-decoration-none mx-1 p-0 text-center">
                                <i class="{{$itemSocials["icon"]}} text-dark font-size-xlg"></i>
                            </a>
                        @endforeach

                    </div>
                </section>
            @endif

        </section>

    @endif




</section>