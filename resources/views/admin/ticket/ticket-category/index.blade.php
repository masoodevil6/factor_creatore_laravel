@extends("admin.layouts.master")
@section("titlePage" , "ادمین- دسته بندی تیکت ها")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="main-body-container-header">
                <h5>
                    لیست دسته بندی تیکت ها
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.tickets.ticket-category.create")}}" class="btn btn-info btn-sm max-height-30">
                    دسته بندی جدید
                </a>

                <div class="mx-2 ">
                    <p class="text-center text-white font-size-12  bg-grey m-0 rounded">
                        فیلتر ها
                    </p>

                    <form action="{{ route("admin.tickets.ticket-category.index") }}" method="get" class=" border border-dark rounded p-1 d-flex">
                        <div class="d-block">
                            <div class="float-right mx-1">
                                <label for="filter-for-cate" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                    عنوان دسته
                                </label>
                                <input name="cate" id="filter-for-cate" type="text" value="{{$cateSearch}}" placeholder="جستجو دسته ..." class="form-control form-control-sm form-text">
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
                        <th scope="col" class="w-60  font-size-12">عنوان دسته</th>
                        <th scope="col" class="w-10  font-size-12">وضعیت</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($ticketCategories As $key => $itemTicketCategory)
                        <x-row-tables.admin.component-item-ticket-categories
                                :ticket-category-key='$key+1'
                                :ticket-category-id="$itemTicketCategory -> id"
                                :ticket-category-title="$itemTicketCategory -> title"
                                :ticket-category-status='$itemTicketCategory -> status'/>
                    @endforeach
                    </tbody>

                </table>

            </section>

        </section>
    </section>


@endsection