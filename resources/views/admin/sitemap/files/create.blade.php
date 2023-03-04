@extends("admin.layouts.master")
@section("titlePage" , "ادمین- اطلاعات فایل نقشه سایت")


@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.sitemap.file.index")}}" class="btn btn-info btn-sm">
                    بازگشت
                </a>

            </section>


            <section class="mt-3 border-bottom">

                <x-fields.component-from-data
                        :action='(isset($sitemapFile["id"]) && $sitemapFile["id"] > 0) ? route("admin.sitemap.file.update" , $sitemapFile->id ) : route("admin.sitemap.file.store" ) '>

                    @if(isset($sitemapFile["id"]) && $sitemapFile["id"] > 0)
                        @method("put")
                    @endif

                    <x-fields.component-input-insert
                            title-en="title_fa"
                            title-fa="عنوان فارسی فایل"
                            :value="isset($sitemapFile['title_fa']) ? $sitemapFile['title_fa'] : ''" />

                    <x-fields.component-input-insert
                            title-en="title_en"
                            title-fa="عنوان انگلیسی فایل"
                            :value="isset($sitemapFile['title_en']) ? $sitemapFile['title_en'] : ''" />

                </x-fields.component-from-data>


            </section>

        </section>
    </section>


@endsection


@section("footer-tag")

@endsection