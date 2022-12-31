<footer class="row mt-5 mx-0 p-0 ">

    @include("public.social-site")

    <section class="color-family-1 w-100 shadow">

        <section class="col-12 row justify-content-center  m-0">

            <section class="col-12 col-lg-10 row justify-content-between m-0">
                <section  class="col-lg-8 font-size-md text-white text-center pt-2">
                    {!! $aboutUs !!}
                </section>

                <section  class="col-lg-4">

                </section>
            </section>

        </section>

        <section class="col-12 row justify-content-center bg-warning   m-0">

            <section class="col-12 col-lg-10 row justify-content-between m-0">
                <section class="color-family-2 py-1 px-2 my-1 rounded float-right">
                    {{$version}}
                </section>

                <section  class=" font-size-md text-right pt-2 mr-2 ">
                    استفاده از مطالب سایت
                    {{$siteName}}
                    فقط برای مقاصد غیرتجاری و با ذکر منبع بلامانع است. کلیه حقوق این سایت متعلق به چرخ دنده های بازی (GOG) می‌باشد
                </section>
            </section>
        </section>

    </section>

</footer>