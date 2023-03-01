@extends("admin.layouts.master")
@section("titlePage" , "ادمین- سئو صفحات ثابت")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="main-body-container-header">
                <h5>
                    لیست صفحات ثابت
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">
                <div class="mx-2 "></div>

                <div class="mx-2 "></div>
            </section>

            <section id="table-list-products" class="table-responsive">

                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="w-20  font-size-12">عنوان صفحه</th>
                        <th scope="col" class="w-20  font-size-12">seo title</th>
                        <th scope="col" class="w-40  font-size-12">seo description</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($pages As $key => $itemPage)
                        <x-row-tables.admin.component-item-seo-page
                                :page-key=" $key+1"
                                :page-id="$itemPage -> id"
                                :page-title="$itemPage -> title"
                                :page-seo-title="$itemPage -> meta != null ? $itemPage -> meta -> title : '-'"
                                :page-seo-description="$itemPage -> meta != null ? $itemPage -> meta -> description : '-'"/>
                    @endforeach
                    </tbody>

                </table>

            </section>


        </section>
    </section>


@endsection