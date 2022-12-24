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

                <div class="mx-2">
                    <input type="text" placeholder="جستجو ..." class="form-control form-control-sm form-text">
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

                        <x-row-tables.user.component-item-tickets
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