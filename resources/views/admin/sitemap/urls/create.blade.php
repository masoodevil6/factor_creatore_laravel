@extends("admin.layouts.master")
@section("titlePage" , "ادمین- اطلاعات آدرس نقشه سایت")


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
                        :action='(isset($sitemapUrl["id"]) && $sitemapUrl["id"] > 0) ? route("admin.sitemap.url.update" , $sitemapUrl->id ) : route("admin.sitemap.url.store" ) '>

                    @if(isset($sitemapUrl["id"]) && $sitemapUrl["id"] > 0)
                        @method("put")
                    @endif

                    <x-fields.component-input-insert
                            title-en="title"
                            title-fa="عنوان آدرس"
                            :value="isset($sitemapUrl['title']) ? $sitemapUrl['title'] : ''" />

                    <x-fields.component-input-insert
                            title-en="url"
                            title-fa="آدرس"
                            :value="isset($sitemapUrl['url']) ? $sitemapUrl['url'] : ''" />


                        <x-fields.component-select-options
                                title-en="sitemap_file_id"
                                title-fa="فایل نقشه سایت">

                            @foreach($sitemapFiles As $sitemapFile)
                                <option value="{{$sitemapFile->id}}" @if(isset($sitemapUrl["sitemap_file_id"]) && $sitemapFile["id"]==$sitemapUrl["sitemap_file_id"]) selected @endif> {{$sitemapFile->title_fa}}  </option>
                            @endforeach

                        </x-fields.component-select-options>



                        <x-fields.component-select-options
                                title-en="changefreq"
                                title-fa="فرکانس بررسی">

                            @foreach($listChangeFreqs As $changeFreq)
                                <option value="{{$changeFreq["changefreq_title_en"]}}" @if(isset($sitemapUrl["changefreq"]) && $sitemapUrl["changefreq"]==$changeFreq["changefreq_title_en"]) selected @endif> {{$changeFreq["changefreq_title_fa"]}}  </option>
                            @endforeach

                        </x-fields.component-select-options>



                        <x-fields.component-select-options
                                title-en="priority"
                                title-fa="اولویت [درصد]">

                            @foreach($listPriorities As $priority)
                                <option value="{{$priority["priority_title_en"]}}" @if(isset($sitemapUrl["priority"]) && $sitemapUrl["priority"]==$priority["priority_title_en"]) selected @endif> {{$priority["priority_title_fa"]}}  </option>
                            @endforeach

                        </x-fields.component-select-options>



                </x-fields.component-from-data>


            </section>

        </section>
    </section>


@endsection


@section("footer-tag")

@endsection