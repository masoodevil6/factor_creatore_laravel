@extends("admin.layouts.master")
@section("titlePage" , "ادمین- لیست ادمین ها")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="main-body-container-header">
                <h5>
                    لیست ادمین ها
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.panel.user-admin.create")}}" class="btn btn-info btn-sm max-height-30">
                    افزودن ادمین جدید
                </a>


                <div class="mx-2 ">
                    <p class="text-center text-white font-size-12  bg-grey m-0 rounded">
                        فیلتر ها
                    </p>

                    <form action="{{ route("admin.panel.user-admin.index") }}" method="get" class="border border-dark rounded p-1 d-flex">
                        <div class="d-block">
                            <div class="float-right mx-1">
                                <label for="filter-for-user" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                    کاربر
                                </label>
                                <input name="user" id="filter-for-user" type="text" value="{{$userSearch}}" placeholder="جستجو کاربر ..." class="form-control form-control-sm form-text">
                            </div>

                            <div class="float-right mx-1">
                                <label for="filter-for-email" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                    ایمیل
                                </label>
                                <input name="email" id="filter-for-email" type="text" value="{{$userEmailSearch}}" placeholder="جستجو ایمیل ..." class="form-control form-control-sm form-text">
                            </div>

                            <div class="float-right mx-1">
                                <label for="filter-for-panel" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                    پنل
                                </label>
                                <select name="panel" id="filter-for-panel" class="form-control form-control-sm form-text">
                                    <option value="0" @if($panelSearcher==0) selected @endif> همه </option>
                                    @foreach($panels As $itemPanel)
                                        <option value="{{$itemPanel->id}}" @if($panelSearcher==$itemPanel->id) selected @endif> {{$itemPanel->title}} </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>


                        <button type="submit"  class="btn btn-info round float-left font-size-md mt-1">
                            <i class="fa fa-search"></i>
                            جستجو
                        </button>
                    </form>
                </div>

            </section>

            <section id="table-list-products" class="table-responsive">

                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="w-20  font-size-12">کاربر</th>
                        <th scope="col" class="w-20  font-size-12">ایمیل</th>
                        <th scope="col" class="w-20  font-size-12">پنل</th>
                        <th scope="col" class="w-10  font-size-12">وضعیت</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($AdminUsers As $key => $itemUserAdmin)
                        <x-row-tables.admin.component-item-user-admin
                                :user-admin-key='($AdminUsers->currentPage() -1 )*$AdminUsers->perPage() + $key+1'
                                :user-admin-status="$itemUserAdmin->status"
                                :admin-title="$itemUserAdmin->title"
                                :user-id="$itemUserAdmin->user_id"
                                :user-email="$itemUserAdmin->email"
                                :user-name="$itemUserAdmin ->name.' '.$itemUserAdmin ->family"/>
                    @endforeach
                    </tbody>

                </table>

            </section>

            <x-row-tables.admin.component-pageinate-panels
                    :list="$AdminUsers"/>

        </section>
    </section>


@endsection