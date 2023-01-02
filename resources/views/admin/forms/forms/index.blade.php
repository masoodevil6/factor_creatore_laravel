@extends("admin.layouts.master")
@section("titlePage" , "ادمین- لیست فرم ها")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="main-body-container-header">
                <h5>
                    لیست فرم ها
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.forms.form.create")}}" class="btn btn-info btn-sm max-height-30">
                    دسته بندی فرم جدید
                </a>

                <div class="mx-2 ">
                    <p class="text-center text-white font-size-12  bg-grey m-0 rounded">
                        فیلتر ها
                    </p>

                    <form action="{{ route("admin.forms.form.index") }}" method="get" class=" border border-dark rounded p-1 d-flex">
                        <div class="d-block">
                            <div class="float-right mx-1">
                                <label for="filter-for-form-name" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                    عنوان فرم
                                </label>
                                <input name="name" id="filter-for-form-name" type="text" value="{{$formNameSearch}}" placeholder="جستجو ..." class="form-control form-control-sm form-text">
                            </div>

                            <div class="float-right mx-1">
                                <label for="filter-for-subscribe" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                    اشتراک
                                </label>
                                <select name="subscribe" id="filter-for-subscribe" class="form-control form-control-sm form-text">

                                    <option value="0" @if($subscribeSearch==0) selected @endif> همه </option>
                                    @foreach($subscribes As $itemSubscribe)
                                        <option value="{{$itemSubscribe->id}}" @if($subscribeSearch==$itemSubscribe->id) selected @endif> {{$itemSubscribe->title}} </option>
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
                        <th scope="col" class="w-15  font-size-12">عنوان فرم</th>
                        <th scope="col" class="w-10  font-size-12">تصویر فرم</th>
                        <th scope="col" class="w-10  font-size-12">دسته</th>
                        <th scope="col" class="w-10  font-size-12">اشتراک</th>
                        <th scope="col" class="w-15  font-size-12">کلاس</th>
                        <th scope="col" class="w-10  font-size-12">وضعیت</th>
                        <th scope="col" class="w-10  font-size-12">منتخب</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($forms As $key => $itemForm)
                        <x-row-tables.admin.component-item-form-admin
                                :form-key='($forms->currentPage() -1 )*$forms->perPage() + $key+1'
                                :form-id="$itemForm -> id"
                                :form-name="$itemForm -> name"
                                :form-image="$itemForm -> image"
                                :form-category="$itemForm -> form_category_id != null ? $itemForm ->formCategory->title : '-'"
                                :form-subscribe="$itemForm -> subscribe_id != null ? $itemForm ->subscribe->title : '-'"
                                :form-class="$itemForm -> class_name"
                                :form-status="$itemForm -> status"
                                :form-selected="$itemForm -> selected"/>
                    @endforeach
                    </tbody>

                </table>

            </section>

            <x-row-tables.admin.component-pageinate-panels
                    :list="$forms"/>

        </section>
    </section>


@endsection

@section("footer-tag")

@endsection