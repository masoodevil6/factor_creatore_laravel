@extends("admin.layouts.master")
@section("titlePage" , "ادمین- سئو صفحات اشتراک ها")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="main-body-container-header">
                <h5>
                    لیست صفحات اشتراک ها
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
                        <th scope="col" class="w-20  font-size-12">عنوان اشتراک</th>
                        <th scope="col" class="w-20  font-size-12">seo title</th>
                        <th scope="col" class="w-40  font-size-12">seo description</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($subscribes As $key => $itemSubscribePage)
                        <x-row-tables.admin.component-item-seo-subscribes-page
                                :page-key=" $key+1"
                                :page-id="$itemSubscribePage -> id"
                                :page-slug="$itemSubscribePage -> slug"
                                :page-title="$itemSubscribePage -> title"
                                :page-seo-title="$itemSubscribePage -> meta != null ? $itemSubscribePage -> meta -> title : '-'"
                                :page-seo-description="$itemSubscribePage -> meta  != null ? $itemSubscribePage -> meta -> description  : '-'"/>
                    @endforeach
                    </tbody>

                </table>

            </section>

            <x-row-tables.admin.component-pageinate-panels
                    :list="$subscribes"/>


        </section>
    </section>


@endsection