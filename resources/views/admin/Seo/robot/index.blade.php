@extends("admin.layouts.master")
@section("titlePage" , "ادمین- ربات ها")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0 ">
        <section class="main-body-container col-12 my-2 px-2 ">

            <section class="main-body-container-header">
                <h5>
                    لیست ربات ها
                </h5>
            </section>

            <section class="body-content d-flex justify-content-between pb-2 border-bottom">

                <a href="{{route("admin.seo.robot.create")}}" class="btn btn-info btn-sm max-height-30">
                    ربات جدید
                </a>


                <div class="mx-2 "></div>

            </section>

            <section id="table-list-products" class="table-responsive">

                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="w-25  font-size-12">عنوان ربات</th>
                        <th scope="col" class="w-50  font-size-12">توصیف</th>
                        <th scope="col" class="text-center  font-size-12">
                            <i class="fa fa-cogs"></i>
                            <span>تنظیمات</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($robots As $key => $itemRobot)
                        <x-row-tables.admin.component-item-seo-robot
                                :robot-key=" $key+1"
                                :robot-id="$itemRobot -> id"
                                :robot-title="$itemRobot -> title"
                                :robot-description="$itemRobot -> description"/>
                    @endforeach
                    </tbody>

                </table>

            </section>


        </section>
    </section>


@endsection