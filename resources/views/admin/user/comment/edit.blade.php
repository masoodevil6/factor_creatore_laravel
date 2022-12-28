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

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <x-row-tables.admin.component-info-user
                        :user-id='$comment -> user->id'
                        :user-full-name="$comment -> user -> fullName"/>

            </section>

            <section class="mt-3 border-bottom">

                <x-fields.component-from-data
                        :action='route("admin.users.comment.update" , $comment->id )'>


                    <x-fields.component-select-options
                            title-en="status"
                            title-fa="وضعیت">

                        <option value="0" @if(isset($comment["status"]) && $comment["status"]==0) selected @endif>غیر فعال </option>
                        <option value="1" @if(isset($comment["status"]) && $comment["status"]==1) selected @endif> فعال </option>

                    </x-fields.component-select-options>

                    <x-fields.component-select-options
                            title-en="approved"
                            title-fa="تاییدیه">

                        <option value="0" @if(isset($comment["approved"]) && $comment["approved"]==0) selected @endif> تایید نشده </option>
                        <option value="1" @if(isset($comment["approved"]) && $comment["approved"]==1) selected @endif> تایید شده </option>

                    </x-fields.component-select-options>


                    <x-fields.component-sk-editor
                            title-en="body"
                            title-fa="بیوگرافی"
                            ck-editor="0"
                            :value="isset($comment['body']) ? $comment['body'] : ''" />



                </x-fields.component-from-data>


            </section>

        </section>
    </section>


@endsection


@section("footer-tag")

@endsection