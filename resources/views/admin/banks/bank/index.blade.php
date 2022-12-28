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

                <a href="{{route("admin.banks.bank.create")}}" class="btn btn-info btn-sm">
                    بانک جدید
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
                                :bank-key='$key+1'
                                :bank-id="$itemBank -> id"
                                :bank-title="$itemBank -> title"
                                :bank-status="$itemBank -> status"/>
                    @endforeach
                    </tbody>

                </table>

            </section>

        </section>
    </section>


@endsection