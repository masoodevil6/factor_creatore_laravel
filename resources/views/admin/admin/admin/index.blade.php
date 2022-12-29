@extends("admin.layouts.master")
@section("titlePage" , "ادمین- لیست پنل ها")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="main-body-container-header">
                <h5>
                    لیست پنل ها
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.panel.admin.create")}}" class="btn btn-info btn-sm max-height-30">
                    پنل جدید
                </a>

                <div class="mx-2 ">
                    <p class="text-center text-white font-size-12  bg-grey m-0 rounded">
                        فیلتر ها
                    </p>

                    <form action="{{ route("admin.panel.admin.index") }}" method="get" class=" border border-dark rounded p-1 d-flex">
                        <div class="d-block">
                            <div class="float-right mx-1">
                                <label for="filter-for-panel" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                    عنوان پنل
                                </label>
                                <input name="panel" id="filter-for-panel" type="text" value="{{$panelSearcher}}" placeholder="جستجو پنل ..." class="form-control form-control-sm form-text">
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
                        <th scope="col" class="w-60  font-size-12">پنل</th>
                        <th scope="col" class="w-10  font-size-12">وضعیت</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($admins As $key => $itemAdmin)
                        <x-row-tables.admin.component-item-admin
                                :admin-key='($admins->currentPage() -1 )*$admins->perPage() + $key+1'
                                :admin-id="$itemAdmin -> id"
                                :admin-title="$itemAdmin -> title"
                                :admin-status="$itemAdmin -> status"/>
                    @endforeach
                    </tbody>

                </table>

            </section>

            <x-row-tables.admin.component-pageinate-panels
                    :list="$admins"/>

        </section>
    </section>


@endsection