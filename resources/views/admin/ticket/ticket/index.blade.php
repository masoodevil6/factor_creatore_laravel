@extends("admin.layouts.master")
@section("titlePage" , "ادمین- تیکت ها")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="main-body-container-header">
                <h5>
                    لیست تیکت ها
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <div></div>


                <div class="mx-2 ">
                    <p class="text-center text-white font-size-12  bg-grey m-0 rounded">
                        فیلتر ها
                    </p>

                    <form action="{{ route("admin.tickets.ticket.index") }}" method="get" class=" border border-dark rounded p-1 d-flex">
                        <div class="d-block">
                            <div class="float-right mx-1">
                                <label for="filter-for-user" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                    کاربر
                                </label>
                                <input name="user" id="filter-for-user" type="text" value="{{$userSearch}}" placeholder="جستجو ..." class="form-control form-control-sm form-text">
                            </div>

                            <div class="float-right mx-1">
                                <label for="filter-for-status" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                    وضعیت تیکت
                                </label>
                                <select name="status" id="filter-for-status" class="form-control form-control-sm form-text">

                                    <option value="-1" @if($StatusSearch==-1) selected @endif> همه </option>
                                    <option value="0" @if($StatusSearch==0) selected @endif> بسته </option>
                                    <option value="1" @if($StatusSearch==1) selected @endif> باز </option>
                                </select>
                            </div>

                            <div class="float-right mx-1">
                                <label for="filter-for-cat" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                    دسته بندی
                                </label>
                                <select name="cat" id="filter-for-cat" class="form-control form-control-sm form-text">

                                    <option value="0" @if($ticketCategorySearch==0) selected @endif> همه </option>
                                    @foreach($ticketCategories As $itemTicketCategory)
                                        <option value="{{$itemTicketCategory->id}}" @if($ticketCategorySearch==$itemTicketCategory->id) selected @endif> {{$itemTicketCategory->title}} </option>
                                    @endforeach
                                </select>
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
                        <th scope="col" class="w-30  font-size-12">عنوان [جدید]</th>
                        <th scope="col" class="w-20  font-size-12">فرستنده</th>
                        <th scope="col" class="w-15  font-size-12">دسته</th>
                        <th scope="col" class="w-10  font-size-12">نوع</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($ticketFolders As $key => $itemTicketFolder)

                        <x-row-tables.admin.component-item-tickets
                                :ticket-folder-key="$key+1"
                                :ticket-folder-id="$itemTicketFolder -> id"
                                :ticket-folder-title="$itemTicketFolder -> title"
                                :ticket-folder-user="$itemTicketFolder -> user -> fullName"
                                :ticket-folder-num-not-seen="$itemTicketFolder -> tickets_not_seen_count"
                                :ticket-folder-category="($itemTicketFolder->ticket_category_id != null) ? $itemTicketFolder -> ticketCategory-> title : 'دیگر' "
                                :ticket-folder-status="$itemTicketFolder -> status['id']"/>
                    @endforeach
                    </tbody>

                </table>

            </section>

        </section>
    </section>


@endsection