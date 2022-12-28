@extends("admin.layouts.master")
@section("titlePage" , "ادمین- ویرایش نظر")


@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.users.comment.index")}}" class="btn btn-info btn-sm">
                    بازگشت
                </a>

            </section>


            <section class="mt-3 border-bottom row">


                <x-row-tables.admin.component-info-user
                        :user-id='$comment -> user->id'
                        :user-full-name="$comment -> user -> fullName"/>

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
                        :action='route("admin.users.comment.storeAnswer" , $comment->id )'>


                    <x-fields.component-sk-editor
                            title-en="body"
                            title-fa="متن پاسخ"
                            ck-editor="0"
                            value="" />

                </x-fields.component-from-data>


            </section>

        </section>
    </section>


@endsection


@section("footer-tag")

@endsection