@extends("admin.layouts.master")
@section("titlePage" , "ادمین- ویرایش نظر")


@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.user.comments.index")}}" class="btn btn-info btn-sm">
                    بازگشت
                </a>

            </section>


            <section class="mt-3 border-bottom row">

                <section class=" mx-2 border-bottom col-12 row  m-0 p-0">

                        <span class="col-3 line-height-40 text-center bg-grey-shine">
                            موسیقی
                        </span>

                    <a href="{{route("admin.music.music.subtitle.index" ,$comment->music->id )}}" class="col-8 line-height-40 text-center bg-white">
                        {{$comment->music->title}}
                    </a>

                </section>

                <section class=" mx-2 border-bottom col-12 row m-0 p-0">

                        <span class="col-3 line-height-40 text-center bg-grey-shine">
                            نام نویسنده نظر
                        </span>

                    <a href="#" class="col-8 line-height-40 text-center bg-white">
                        {{--{{$comment->user->fullName}}--}}
                    </a>

                </section>


                <x-fields.component-row-data
                        title='وضعیت'
                        :value='$comment-> status == 1 ? "فعال" : "غیر فعال" '/>

                <x-fields.component-row-data
                        title='تاییدیه'
                        :value='$comment-> approved_title'/>

                <x-fields.component-row-data
                        title='متن نظر'
                        col='col-12'
                        :value='$comment->body'/>


            </section>



            <section class="mt-3 border-bottom">

                <x-fields.component-from-data
                        :action='route("admin.user.comments.storeAnswer" , $comment->id )'>


                    <x-fields.component-sk-editor
                            title-en="body"
                            title-fa="بیوگرافی"
                            ck-editor="0"
                            value="" />

                </x-fields.component-from-data>


            </section>

        </section>
    </section>


@endsection


@section("footer-tag")

@endsection