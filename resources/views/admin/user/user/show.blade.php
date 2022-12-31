@extends("admin.layouts.master")
@section("titlePage" , "ادمین- اطلاعات کاربر")


@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.users.user.index")}}" class="btn btn-info btn-sm">
                    بازگشت
                </a>

                <div style="margin-left: 50px">
                    <x-row-tables.admin.component-drop-down-list-user-panels
                            :user-id='$user -> id'
                            :user-name="$user->fullName"/>
                </div>

            </section>


            <section class="mt-5 border-bottom row p-0 m-0">

                <section class="col-12 gray-400 text-white text-center">
                    اطلاعات کاربر
                </section>

                <x-fields.component-row-data
                        title='نام کاربر'
                        :value='$user -> fullName  '/>

                <x-fields.component-row-data
                        title='شماره تماس'
                        :value='$user -> mobile  '/>

                <x-fields.component-row-data
                        title='ایمیل'
                        :value='$user -> email  '/>

                <x-fields.component-row-data
                        title='وضعیت'
                        :value='$user -> status  '/>

                <x-fields.component-row-data
                        title='زمان ثبت نام'
                        :value='jalaliDate($user -> created_at)  '/>

                <section class="col-6 mt-2">

                    <p class="d-block text-white text-center py-1 font-size-12" style="background-color: grey">
                        تصویر
                    </p>

                    @if(isset($user["profile_photo_path"]) && $user["profile_photo_path"] != "")
                        <img class="d-block m-auto" src="{{asset($user["profile_photo_path"]["indexArray"][$user["profile_photo_path"]["currentImage"]])}}" height="150" alt="تصویر">
                    @endif

                </section>

            </section>

            <x-fields.component-from-data
                    :action='route("admin.users.user.change-info" , $user["id"])'>

                <x-fields.component-select-options
                        title-en="status"
                        title-fa="وضعیت">

                    <option value="0" @if(isset($user["status"]) && $user["status"]==0) selected @endif>غیر فعال </option>
                    <option value="1" @if(isset($user["status"]) && $user["status"]==1) selected @endif> فعال </option>

                </x-fields.component-select-options>

            </x-fields.component-from-data>

        </section>
    </section>


@endsection


@section("footer-tag")

@endsection