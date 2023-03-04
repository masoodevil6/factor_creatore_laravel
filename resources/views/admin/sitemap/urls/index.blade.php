@extends("admin.layouts.master")
@section("titlePage" , "ادمین- آدرس های نقشه سایت")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="main-body-container-header">
                <h5>
                    آدرس های نقشه سایت
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.sitemap.url.create")}}" class="btn btn-info btn-sm max-height-30">
                    آدرس جدید
                </a>

                <div class="mx-2 ">
                    <p class="text-center text-white font-size-12  bg-grey m-0 rounded">
                        فیلتر ها
                    </p>

                    <form action="{{ route("admin.sitemap.url.index") }}" method="get" class=" border border-dark rounded p-1 d-flex">
                        <div class="d-block">
                            <div class="float-right mx-1">
                                <label for="filter-for-subscribe" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                    جستجو فایل نقشه سایت
                                </label>
                                <select name="file" id="filter-for-subscribe" class="form-control form-control-sm form-text">

                                    <option value="0" @if($sitemapFileSearch==0) selected @endif> همه </option>
                                    @foreach($sitemapFiles As $sitemapFile)
                                        <option value="{{$sitemapFile->id}}" @if($sitemapFileSearch==$sitemapFile->id) selected @endif> {{$sitemapFile->title_fa}} </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <button type="submit"  class="btn btn-info round float-left font-size-md mt-1">
                            <i class="fa fa-search"></i>
                            جستجو
                        </button>
                    </form>
                </div>

            </section>

            <section id="table-list-products" class="table-responsive">

                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="w-15  font-size-12">عنوان آدرس</th>
                        <th scope="col" class="w-45 font-size-12">آدرس</th>
                        <th scope="col" class="w-15  font-size-12">فایل</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($sitemapUrls As $key => $sitemapUrl)
                        <x-row-tables.admin.component-item-sitemap-url
                                :sitemap-key=" $key+1"
                                :sitemap-id="$sitemapUrl -> id"
                                :sitemap-title="$sitemapUrl -> title"
                                :sitemap-url="$sitemapUrl -> url"
                                :sitemap-file="$sitemapUrl -> sitmapFile -> title_fa"/>
                    @endforeach
                    </tbody>

                </table>

            </section>


        </section>
    </section>


@endsection