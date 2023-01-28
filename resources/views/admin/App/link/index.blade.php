@extends("admin.layouts.master")
@section("titlePage" , "ادمین- لیست لینک فایل برنامه ها")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="main-body-container-header">
                <h5>
                    لیست لینک فایل ها
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.apps.link.create")}}" class="btn btn-info btn-sm max-height-30">
                    لینک فایل جدید
                </a>

                <div class="mx-2 ">
                    <p class="text-center text-white font-size-12  bg-grey m-0 rounded">
                        فیلتر ها
                    </p>

                    <form action="{{ route("admin.apps.link.index") }}" method="get" class=" border border-dark rounded p-1 d-flex">
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

                            <div class="float-right mx-1">
                                <label for="filter-for-file" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                                    دسته بندی
                                </label>
                                <select name="file" id="filter-for-file" class="form-control form-control-sm form-text">
                                    <option value="" @if($appFile==0) selected @endif> همه </option>
                                    @foreach($appFiles As $itemFile)
                                        <option value="{{$itemFile->id}}" @if($appFile==$itemFile->id) selected @endif> {{$itemFile->name}} </option>
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
                        <th scope="col" class="w-10  font-size-12">عنوان لینک</th>
                        <th scope="col" class="w-15  font-size-12">تصویر</th>
                        <th scope="col" class="w-15  font-size-12">فایل / لینک</th>
                        <th scope="col" class="w-10  font-size-12">دسته بندی</th>
                        <th scope="col" class="w-10  font-size-12">وضعیت</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($appLinks As $key => $itemAppLink)
                        <x-row-tables.admin.component-item-app-file-link-admin
                                :app-file-link-key='($appLinks->currentPage() -1 )*$appLinks->perPage() + $key+1'
                                :app-file-link-id="$itemAppLink -> id"
                                :app-file-link-image="$itemAppLink -> image"
                                :app-file-link-name="$itemAppLink -> name"
                                :app-file-link-status="$itemAppLink -> status"
                                :app-file="!empty($itemAppLink -> appCategory) ? $itemAppLink -> appCategory->name : '-' "
                                :app-file-category="!empty($itemAppLink -> appFile) ? $itemAppLink -> appFile->name : $itemAppLink->address "/>
                    @endforeach
                    </tbody>

                </table>

            </section>

            <x-row-tables.admin.component-pageinate-panels
                    :list="$appLinks"/>

        </section>
    </section>


@endsection