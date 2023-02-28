@extends("admin.layouts.master")
@section("titlePage" , "ادمین- اطلاعات ربات")


@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.seo.robot.index")}}" class="btn btn-info btn-sm">
                    بازگشت
                </a>

            </section>


            <section class="mt-3 border-bottom">

                <x-fields.component-from-data
                        :action='(isset($seoRobot["id"]) && $seoRobot["id"] > 0) ? route("admin.seo.robot.update" , $seoRobot->id ) : route("admin.seo.robot.store" ) '>

                    @if(isset($seoRobot["id"]) && $seoRobot["id"] > 0)
                        @method("put")
                    @endif

                    <x-fields.component-input-insert
                            title-en="title"
                            title-fa="عنوان ربات"
                            :value="isset($seoRobot['title']) ? $seoRobot['title'] : ''" />


                    <x-fields.component-sk-editor
                            title-en="description"
                            title-fa="توصیف ربات"
                            ck-editor="0"
                            display="col-6"
                            :value="isset($seoRobot['description']) ? $seoRobot['description'] : ''" />



                </x-fields.component-from-data>


            </section>

        </section>
    </section>


@endsection


@section("footer-tag")

@endsection