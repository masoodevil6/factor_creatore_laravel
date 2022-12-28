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

                <a href="{{route("admin.subscribes.subscribe.create")}}" class="btn btn-info btn-sm">
                    اشتراک جدید
                </a>

                <div class="mx-2">
                    <input type="text" placeholder="جستجو ..." class="form-control form-control-sm form-text">
                </div>

            </section>

            <section id="table-list-products" class="table-responsive">

                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="w-30  font-size-12">عنوان</th>
                        <th scope="col" class="w-10  font-size-12">مبلغ</th>
                        <th scope="col" class="w-10  font-size-12">مدت</th>
                        <th scope="col" class="w-10  font-size-12">دانلود</th>
                        <th scope="col" class="w-10  font-size-12">پخش</th>
                        <th scope="col" class="w-10  font-size-12">وضعیت</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($subscribes As $key => $itemSubscribe)
                        <x-row-tables.admin.component-item-subscribe
                                :subscribe-key="$key+1"
                                :subscribe-id="$itemSubscribe -> id"
                                :subscribe-title="$itemSubscribe -> title"
                                :subscribe-price="$itemSubscribe -> totalPrice"
                                :subscribe-duration="$itemSubscribe -> duration"
                                :subscribe-download="$itemSubscribe -> download"
                                :subscribe-play="$itemSubscribe -> play"
                                :subscribe-status="$itemSubscribe -> status"/>
                    @endforeach
                    </tbody>

                </table>

            </section>

        </section>
    </section>


@endsection