@extends("admin.layouts.master")
@section("titlePage" , "ادمین- لیست پنل ها")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="main-body-container-header">
                <h5>
                    لیست واحدها
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.public.unit.create")}}" class="btn btn-info btn-sm max-height-30">
                    واحد جدید
                </a>

                <form action="{{ route("admin.public.unit.index") }}" method="get" class="border border-dark rounded p-1 d-flex">
                    <div class="d-block">
                        <div class="float-right mx-1">
                            <label for="filter-for-unit" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                واحد
                            </label>
                            <input name="unit" id="filter-for-unit" type="text" value="{{$unitSearch}}" placeholder="جستجو واحد ..." class="form-control form-control-sm form-text">
                        </div>
                    </div>


                    <button type="submit"  class="btn btn-info round float-left font-size-md mt-1">
                        <i class="fa fa-search"></i>
                        جستجو
                    </button>
                </form>

            </section>

            <section id="table-list-products" class="table-responsive">

                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="w-70  font-size-12">عنوان واحد</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($units As $key => $itemUnit)
                        <x-row-tables.admin.component-item-unit-admin
                                :unit-key='($units->currentPage() -1 )*$units->perPage() + $key+1'
                                :unit-id="$itemUnit -> id"
                                :unit-name="$itemUnit -> name"/>
                    @endforeach
                    </tbody>

                </table>

            </section>

            <x-row-tables.admin.component-pageinate-panels
                    :list="$units"/>

        </section>
    </section>


@endsection