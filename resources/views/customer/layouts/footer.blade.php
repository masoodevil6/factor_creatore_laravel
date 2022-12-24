<footer class="color-family-c-1 row mt-5 mx-0 p-0 shadow">



    <section class="col-12 row justify-content-center mx-0 pt-1 w-100 color-family-c-2 border-bottom border-white">

        <section class="col-12 col-lg-10 row justify-content-between m-0">
            <section  class="row col-lg-8 mt-lg-1 row mt-2 m-0">

                <section id="form-items-nav" class=" col-12 col-lg-10 row justify-content-lg-start justify-content-center color-family-c-1 p-0 m-0">
                    @include("public.link-nav-location")
                </section>

            </section>

            @include("public.social-site")

        </section>

    </section>


    <section class="col-12 row justify-content-center pt-1 m-0">

        <section class="col-12 col-lg-10 row justify-content-between m-0">
            <section  class="col-lg-8 font-size-md text-white text-center pt-2">
                {!! $aboutUs !!}
            </section>

            <section  class="col-lg-4">

            </section>
        </section>

    </section>


    <section class="col-12 row justify-content-center pt-1 color-family-c-2 m-0">

        <section class="col-12 col-lg-10 row justify-content-between m-0">
            <section class="bg-warning py-1 px-2 mb-1 rounded float-right">
                {{$version}}
            </section>

            <section  class=" font-size-md text-white text-right pt-2 mr-2 ">
                استفاده از مطالب سایت
                {{$siteName}}
                فقط برای مقاصد غیرتجاری و با ذکر منبع بلامانع است. کلیه حقوق این سایت متعلق به چرخ دنده های بازی (GOG) می‌باشد
            </section>
        </section>
    </section>

</footer>