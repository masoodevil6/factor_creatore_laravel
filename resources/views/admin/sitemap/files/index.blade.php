@extends("admin.layouts.master")
@section("titlePage" , "ادمین- فایل های نقشه سایت")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="main-body-container-header">
                <h5>
                    فایل های نقشه سایت
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.sitemap.file.create")}}" class="btn btn-info btn-sm max-height-30">
                    فایل جدید
                </a>


                <div class="mx-2 "></div>

            </section>

            <section id="table-list-products" class="table-responsive">

                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="w-25  font-size-12">عنوان فارسی</th>
                        <th scope="col" class="w-50  font-size-12">عنوان انگلیسی</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($sitemapFiles As $key => $sitemapFile)
                        <x-row-tables.admin.component-item-sitemap-file
                                :sitemap-key=" $key+1"
                                :sitemap-id="$sitemapFile -> id"
                                :sitemap-title-fa="$sitemapFile -> title_fa"
                                :sitemap-title-en="$sitemapFile -> title_en"/>
                    @endforeach
                    </tbody>

                </table>

            </section>


        </section>
    </section>


@endsection