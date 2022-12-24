@extends("admin.layouts.master")
@section("titlePage" , "ادمین- نظرات")

@section("head-tag")

@endsection


@section("content")

<section class="row p-0 m-0 ">
    <section class="main-body-container col-12 my-2 px-2 ">

        <section class="main-body-container-header">
            <h5>
                لیست نظر ها
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
                    <th scope="col" class="w-50  font-size-12">متن نظر</th>
                    <th scope="col" class="w-10  font-size-12">والد</th>
                    <th scope="col" class="w-10  font-size-12">وضعیت</th>
                    <th scope="col" class="w-10  font-size-12">تاییدیه</th>
                    <th scope="col" class="text-center  font-size-12">
                        <i class="fa fa-cogs"></i>
                        <span>تنظیمات</span>
                    </th>
                </tr>
                </thead>

                <tbody>
                @foreach($comments As $key => $itemComment)
                <x-row-tables.user.component-item-user-commmnet
                    :comment-key='$key+1'
                    :comment-id="$itemComment -> id"
                    :comment-body="$itemComment -> body"
                    :comment-parent="$itemComment -> parent"
                    :comment-seen="$itemComment -> seen"
                    :comment-status='$itemComment -> status'
                    :comment-approved='$itemComment -> approved'/>
                @endforeach
                </tbody>

            </table>

        </section>

    </section>
</section>


@endsection