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

                <a href="{{route("admin.public.unit.create")}}" class="btn btn-info btn-sm">
                    واحد جدید
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
                                :unit-key='$key+1'
                                :unit-id="$itemUnit -> id"
                                :unit-name="$itemUnit -> name"/>
                    @endforeach
                    </tbody>

                </table>

            </section>

        </section>
    </section>


@endsection