@extends("admin.layouts.master")
@section("titlePage" , "ادمین- لیست فاکتورها")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="main-body-container-header">
                <h5>
                    لیست فاکتورها
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="#" class="btn btn-info btn-sm disabled max-height-30">
                    فاکتور جدید
                </a>


                <div class="mx-2 ">
                    <p class="text-center text-white font-size-12  bg-grey m-0 rounded">
                        فیلتر ها
                    </p>

                    <form action="{{ route("admin.factors.factor.index") }}" method="get" class=" border border-dark rounded p-1 d-flex">
                        <div class="d-block">
                            <div class="float-right mx-1">
                                <label for="filter-for-user" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                    کاربر
                                </label>
                                <input name="user" id="filter-for-user" type="text" value="{{$userSearch}}" placeholder="جستجو ..." class="form-control form-control-sm form-text">
                            </div>

                            <div class="float-right mx-1">
                                <label for="filter-for-res" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                    شماره فاکتور
                                </label>
                                <input name="res" id="filter-for-res" type="text" value="{{$resNumSearch}}" placeholder="جستجو ..." class="form-control form-control-sm form-text">
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
                        <th scope="col" class="w-15  font-size-12">شماره رزرو</th>
                        <th scope="col" class="w-15  font-size-12">کاربر</th>
                        <th scope="col" class="w-15  font-size-12">فرم</th>
                        <th scope="col" class="w-15  font-size-12">تاریخ</th>
                        <th scope="col" class="w-15  font-size-12">وضعیت</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($factors As $key => $itemFactor)
                        <x-row-tables.admin.component-item-factor-admin
                                :factor-key='($factors->currentPage() -1 )*$factors->perPage() + $key+1'
                                :factor-id="$itemFactor -> id"
                                :factor-res-num="$itemFactor -> res_num"
                                :factor-user="$itemFactor -> user"
                                :factor-form="$itemFactor -> form"
                                :factor-date="$itemFactor -> created_at"
                                :factor-status="$itemFactor -> status"/>
                    @endforeach
                    </tbody>

                </table>

            </section>

            <x-row-tables.admin.component-pageinate-panels
                    :list="$factors"/>

        </section>
    </section>


@endsection

@section("footer-tag")

@endsection