@extends("admin.layouts.master")
@section("titlePage" , "ادمین- لیست فایل برنامه ها")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="main-body-container-header">
                <h5>
                    لیست فایل برنامه ها
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.apps.file.create")}}" class="btn btn-info btn-sm max-height-30">
                    فایل جدید برنامه
                </a>

                <div class="mx-2 ">
                    <p class="text-center text-white font-size-12  bg-grey m-0 rounded">
                        فیلتر ها
                    </p>

                    <form action="{{ route("admin.apps.file.index") }}" method="get" class=" border border-dark rounded p-1 d-flex">
                        <div class="d-block">

                            <div class="float-right mx-1">
                                <label for="filter-for-category" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                    دسته بندی
                                </label>
                                <select name="category" id="filter-for-category" class="form-control form-control-sm form-text">
                                    <option value="" @if($appCategory==0) selected @endif> همه </option>
                                    @foreach($appCategories As $itemAppCategory)
                                        <option value="{{$itemAppCategory->id}}" @if($appCategory==$itemAppCategory->id) selected @endif> {{$itemAppCategory->name}} </option>
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
                        <th scope="col" class="w-25  font-size-12">عنوان فایل</th>
                        <th scope="col" class="w-10  font-size-12">نسخه</th>
                        <th scope="col" class="w-10  font-size-12">فرمت</th>
                        <th scope="col" class="w-10  font-size-12">سایز</th>
                        <th scope="col" class="w-20  font-size-12">دسته</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($appFiles As $key => $itemFile)
                        <x-row-tables.admin.component-item-app-file-admin
                                :app-file-key='($appFiles->currentPage() -1 )*$appFiles->perPage() + $key+1'
                                :app-file-id="$itemFile -> id"
                                :app-file-name="$itemFile -> name"
                                :app-file-version="$itemFile -> version"
                                :app-file-format="$itemFile -> format"
                                :app-file-size="$itemFile -> size"
                                :app-file-category="!empty($itemFile -> appCategory) ? $itemFile -> appCategory->name : '-' "/>
                    @endforeach
                    </tbody>

                </table>

            </section>

            <x-row-tables.admin.component-pageinate-panels
                    :list="$appFiles"/>

        </section>
    </section>


@endsection