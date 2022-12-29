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

            <div class="mx-2 ">
                <p class="text-center text-white font-size-12  bg-grey m-0 rounded">
                    فیلتر ها
                </p>

                <form action="{{ route("admin.users.comment.index") }}" method="get" class=" border border-dark rounded p-1 d-flex">

                    <div class="d-block">
                        <div class="float-right mx-1">
                            <label for="filter-for-user" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                کاربر
                            </label>
                            <input name="user" id="filter-for-user" type="text" value="{{$userSearch}}" placeholder="جستجو ..." class="form-control form-control-sm form-text">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-info round float-left font-size-md mt-1">
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
                    <th scope="col" class="w-45  font-size-12">متن نظر</th>
                    <th scope="col" class="w-10  font-size-12">نویسنده</th>
                    <th scope="col" class="w-5  font-size-12">والد</th>
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
                <x-row-tables.admin.component-item-user-commmnet
                    :comment-key='$key+1'
                    :comment-id="$itemComment -> id"
                    :comment-user-name="$itemComment -> user -> fullName"
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