@extends("admin.layouts.master")
@section("titlePage" , "ادمین- لیست بانک ها")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="main-body-container-header">
                <h5>
                    لیست بانک ها
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.banks.bank.create")}}" class="btn btn-info btn-sm max-height-30">
                    بانک جدید
                </a>

                <div class="mx-2 ">
                    <p class="text-center text-white font-size-12  bg-grey m-0 rounded">
                        فیلتر ها
                    </p>

                    <form action="{{ route("admin.banks.bank.index") }}" method="get" class=" border border-dark rounded p-1 d-flex">
                        <div class="d-block">
                            <div class="float-right mx-1">
                                <label for="filter-for-form-bank" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                    عنوان بانک
                                </label>
                                <input name="bank" id="filter-for-form-bank" type="text" value="{{$bankSearch}}" placeholder="جستجو بانک ..." class="form-control form-control-sm form-text">
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
                        <th scope="col" class="w-60  font-size-12">عنوان بانک</th>
                        <th scope="col" class="w-15  font-size-12">وضعیت</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($banks As $key => $itemBank)
                        <x-row-tables.admin.component-item-bank-admin
                                :bank-key='($banks->currentPage() -1 )*$banks->perPage() + $key+1'
                                :bank-id="$itemBank -> id"
                                :bank-title="$itemBank -> title"
                                :bank-status="$itemBank -> status"/>
                    @endforeach
                    </tbody>

                </table>

            </section>

            <x-row-tables.admin.component-pageinate-panels
                    :list="$banks"/>

        </section>
    </section>


@endsection