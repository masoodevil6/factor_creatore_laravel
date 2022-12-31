@extends("admin.layouts.master")
@section("titlePage" , "ادمین- لیست فروشگاه ها")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="main-body-container-header">
                <h5>
                    لیست فروشگاه ها
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.users.user-store.create")}}" class="btn btn-info btn-sm max-height-30">
                    فروشگاه جدید
                </a>

                <div class="mx-2 ">
                    <p class="text-center text-white font-size-12  bg-grey m-0 rounded">
                        فیلتر ها
                    </p>

                    <form action="{{ route("admin.users.user-store.index") }}" method="get" class=" border border-dark rounded p-1 d-flex">
                        <div class="d-block">
                            <div class="float-right mx-1">
                                <label for="filter-for-user" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                    کاربر
                                </label>
                                <input name="user" id="filter-for-user" type="text" value="{{$userSearch}}" placeholder="جستجو کاربر ..." class="form-control form-control-sm form-text">
                            </div>

                            <div class="float-right mx-1">
                                <label for="filter-for-store" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                    فروشگاه
                                </label>
                                <input name="store" id="filter-for-store" type="text" value="{{$storeSearch}}" placeholder="جستجو فروشگاه ..." class="form-control form-control-sm form-text">
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
                        <th scope="col" class="w-15  font-size-12">فروشگاه</th>
                        <th scope="col" class="w-15  font-size-12">تلفن</th>
                        <th scope="col" class="w-25  font-size-12">آدرس</th>
                        <th scope="col" class="w-15  font-size-12">کاربر</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($userStores As $key => $itemUserStore)
                        <x-row-tables.admin.component-item-user-store-admin
                                :user-Store-key='($userStores->currentPage() -1 )* $userStores->perPage() + $key+1'
                                :user-Store-id="$itemUserStore -> id"
                                :user-Store-name="$itemUserStore -> nameStore"
                                :user-Store-phone="$itemUserStore -> phone"
                                :user-Store-address="$itemUserStore -> address"
                                :user-Store-user="$itemUserStore -> user"/>
                    @endforeach
                    </tbody>

                </table>

            </section>

            <x-row-tables.admin.component-pageinate-panels
                    :list="$userStores"/>


        </section>
    </section>


@endsection