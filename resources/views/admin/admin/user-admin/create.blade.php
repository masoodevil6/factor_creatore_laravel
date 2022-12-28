@extends("admin.layouts.master")
@section("titlePage" , "ادمین- کاربر و پنل")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0">
        <section class="main-body-container col-12 my-2">

            <section class="main-body-container-header">
                <h5>
                    پنل
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.panel.user-admin.index")}}" class="btn btn-info btn-sm">
                    بازگشت
                </a>

            </section>

            @if(isset($user["id"]) && $user["id"] > 0)
               <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                    <x-row-tables.admin.component-info-user
                            :user-id='$user->id'
                            :user-full-name="$user -> fullName"/>

                </section>
            @endif



            <section class="mt-2">

                <x-fields.component-from-data
                        :action='(isset($user["id"]) && $user["id"] > 0) ? route("admin.panel.user-admin.update" , $user["email"]) : route("admin.panel.user-admin.store") '
                        enctype="multipart/form-data">

                    @if(isset($user["id"]) && $user["id"] > 0)
                        @method("put")
                    @else
                        <x-fields.component-input-insert
                                title-en="user_email"
                                title-fa="ایمیل کاربر"
                                value=""/>
                    @endif


                    <x-fields.component-select-options
                            title-en="status"
                            title-fa="وضعیت">

                        <option value="0" @if(isset($user["id"]) && !empty($user->admins) && $user->admins->get(0)->pivot->status == 0) selected @endif>غیر فعال </option>
                        <option value="1" @if(isset($user["id"]) && !empty($user->admins) && $user->admins->get(0)->pivot->status == 1) selected @endif> فعال </option>

                    </x-fields.component-select-options>


                    <x-fields.component-select-options
                            title-en="admin_id"
                            title-fa="پنل ادمین">

                        @foreach($admins As $itemAdmin)
                            <option value="{{$itemAdmin->id}}" @if(isset($user["id"]) && !empty($user->admins) && $user->admins->get(0)->pivot->admin_id==$itemAdmin->id) selected @endif>{{$itemAdmin->title}}</option>
                        @endforeach

                    </x-fields.component-select-options>


                </x-fields.component-from-data>




            </section>

        </section>
    </section>

@endsection