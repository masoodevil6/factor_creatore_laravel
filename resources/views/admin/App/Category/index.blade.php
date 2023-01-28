@extends("admin.layouts.master")
@section("titlePage" , "ادمین- لیست دسته بندی برنامه ها")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="main-body-container-header">
                <h5>
                    لیست دسته بندی برنامه ها
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.apps.category.create")}}" class="btn btn-info btn-sm max-height-30">
                     دسته بندی جدید برنامه
                </a>

                <div class="mx-2 ">
                    <p class="text-center text-white font-size-12  bg-grey m-0 rounded">
                        فیلتر ها
                    </p>

                </div>

            </section>

            <section id="table-list-products" class="table-responsive">

                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="w-75  font-size-12">عنوان دسته بندی</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($appCategories As $key => $itemAppCategory)
                        <x-row-tables.admin.component-item-app-category-admin
                                :app-category-key='$key+1'
                                :app-category-id="$itemAppCategory -> id"
                                :app-category-name="$itemAppCategory -> name"/>
                    @endforeach
                    </tbody>

                </table>

            </section>



        </section>
    </section>


@endsection