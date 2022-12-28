@extends("admin.layouts.master")
@section("titlePage" , "ادمین- لیست فرم ها")

@section("head-tag")
    <meta name="link-this-page" content="{{ route("admin.forms.form.index") }}" />
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

                <a href="{{route("admin.forms.form.create")}}" class="btn btn-info btn-sm" style="max-height: 35px">
                    دسته بندی فرم جدید
                </a>

                <div class="mx-2">
                    <input type="text" placeholder="جستجو ..." class="form-control form-control-sm form-text">

                    <div>
                        <label for="filter-for-subscribes" class="d-block text-right font-size-12 mt-2 mb-0 px-2 bg-grey">
                            فیلتر اشتراک
                        </label>

                        <select id="filter-for-subscribes" onchange="changeFilterSubscribes(this)" class=" form-control form-control-sm form-text font-size-12 my-0" aria-label="Default select example">

                            <option value="" @if($subscribeId == null) selected @endif>
                                همه
                            </option>

                            @foreach($subscribes As $itemSubscribe)
                                <option value="{{$itemSubscribe["id"]}}" @if($subscribeId==$itemSubscribe["id"]) selected @endif>
                                    {{$itemSubscribe["title"]}}
                                </option>
                            @endforeach

                        </select>
                    </div>
                </div>


            </section>

            <section id="table-list-products" class="table-responsive">

                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="w-15  font-size-12">عنوان فرم</th>
                        <th scope="col" class="w-15  font-size-12">تصویر فرم</th>
                        <th scope="col" class="w-15  font-size-12">دسته</th>
                        <th scope="col" class="w-15  font-size-12">اشتراک</th>
                        <th scope="col" class="w-15  font-size-12">کلاس</th>
                        <th scope="col" class="w-10  font-size-12">وضعیت</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($forms As $key => $itemForm)
                        <x-row-tables.admin.component-item-form-admin
                                :form-key='$key+1'
                                :form-id="$itemForm -> id"
                                :form-name="$itemForm -> name"
                                :form-image="$itemForm -> image"
                                :form-category="$itemForm -> form_category_id != null ? $itemForm ->formCategory->title : '-'"
                                :form-subscribe="$itemForm -> subscribe_id != null ? $itemForm ->subscribe->title : '-'"
                                :form-class="$itemForm -> class_name"
                                :form-status="$itemForm -> status"/>
                    @endforeach
                    </tbody>

                </table>

            </section>

        </section>
    </section>


@endsection

@section("footer-tag")

    <script>
        function changeFilterSubscribes(element) {
            var route  = $('meta[name="link-this-page"]').attr('content');
            var subscribeId = $(element).val();
            var location = route;
            if(subscribeId > 0){
                location += "?subscribe="+subscribeId;
            }
            window.location.href = location;
        }
    </script>
@endsection