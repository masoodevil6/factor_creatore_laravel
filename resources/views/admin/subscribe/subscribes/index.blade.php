@extends("admin.layouts.master")
@section("titlePage" , "ادمین- اشتراک ها")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="main-body-container-header">
                <h5>
                    لیست اشتراک ها
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.subscribes.subscribe.create")}}" class="btn btn-info btn-sm max-height-30">
                    اشتراک جدید
                </a>


                <div class="mx-2 ">
                    <p class="text-center text-white font-size-12  bg-grey m-0 rounded">
                        فیلتر ها
                    </p>

                    <form action="{{ route("admin.subscribes.subscribe.index") }}" method="get" class="border border-dark rounded p-1 d-flex">
                        <div class="d-block">
                            <div class="float-right mx-1">
                                <label for="filter-for-sub" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                    اشتراک
                                </label>
                                <input name="sub" id="filter-for-sub" type="text" value="{{$subSearch}}" placeholder="جستجو اشتراک ..." class="form-control form-control-sm form-text">
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
                        <th scope="col" class="w-20  font-size-12">عنوان</th>
                        <th scope="col" class="w-10  font-size-12">مبلغ</th>
                        <th scope="col" class="w-10  font-size-12">مدت</th>
                        <th scope="col" class="w-10  font-size-12">دانلود</th>
                        <th scope="col" class="w-10  font-size-12">پخش</th>
                        <th scope="col" class="w-10  font-size-12">وضعیت</th>
                        <th scope="col" class="w-10  font-size-12">منتخب</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($subscribes As $key => $itemSubscribe)
                        <x-row-tables.admin.component-item-subscribe
                                :subscribe-key="($subscribes->currentPage() -1 )* $subscribes->perPage() + $key+1"
                                :subscribe-id="$itemSubscribe -> id"
                                :subscribe-title="$itemSubscribe -> title"
                                :subscribe-price="$itemSubscribe -> totalPrice"
                                :subscribe-duration="$itemSubscribe -> duration"
                                :subscribe-download="$itemSubscribe -> download"
                                :subscribe-play="$itemSubscribe -> play"
                                :subscribe-status="$itemSubscribe -> status"
                                :subscribe-selected="$itemSubscribe -> selected"/>
                    @endforeach
                    </tbody>

                </table>

            </section>

            <x-row-tables.admin.component-pageinate-panels
                    :list="$subscribes"/>

        </section>
    </section>


@endsection