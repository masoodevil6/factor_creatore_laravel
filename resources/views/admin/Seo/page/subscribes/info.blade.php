@extends("admin.layouts.master")
@section("titlePage" , "ادمین- اطلاعات سئو صفحه")


@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.seo.pages.subscribes.index")}}" class="btn btn-info btn-sm">
                    بازگشت
                </a>

            </section>


            <section class="mt-3 border-bottom">

                <x-fields.component-from-data
                        :action='route("admin.seo.pages.subscribes.store" , $subscribe->slug )'>

                    <x-row-tables.component-seo-page
                            :title=" $subscribe -> meta != null ? $subscribe -> meta -> title : ''"
                            :description="$subscribe -> meta != null ? $subscribe -> meta -> description : ''"
                            :list-keywords="$subscribe -> meta != null ? $subscribe -> meta -> keywords : null"
                            :robots="$robots"
                            :list-robots="$subscribe -> meta != null ? $subscribe -> meta -> robots : null"/>

                </x-fields.component-from-data>


            </section>

        </section>
    </section>


@endsection


@section("footer-tag")

@endsection