<form action="{{route("customer-panel.home" , "factors")}}" method="get" class="row m-2">
    <input name="search"  type="text" value="@if(isset($_GET["search"])){{$_GET["search"]}}@endif" placeholder="جستجو شماره فاکتور..." class="col-8 col-lg-6 form-control form-control-sm form-text">

    <button type="submit" class="btn btn-info round float-left font-size-md  mx-1">
        <i class="fa fa-search"></i>
    </button>
</form>

@if(sizeof($factors) > 0)
    <section class="border border-dark shadow bg-white mt-2 mt-lg-0 ">

        <section class="border-bottom border-dark color-family-1 text-center text-white">
            فاکتور ها
        </section>

        <section id="form_list_main_tickets" class="mx-5 mx-lg-2 my-3 row ">

            @foreach($factors As $key => $itemFactor)

                <section class="col-12 p-0 ">
                    <section  class="item-panel border border-dark m-2  shadow font-size-md position-relative">

                        <section class="d-lg-flex d-block border-bottom border gray-300 ">
                            <section class="col-12 col-lg-4 border-lg-left  border-white gray-100 font-weight-bold">
                                شماره فاکتور
                            </section>
                            <section class="col-12 col-lg-8 ">
                                {{$itemFactor->getFactorModel()->getResNum()}}
                            </section>
                        </section>

                        <section class="d-lg-flex d-block border-bottom border blue-gray-300 text-white border-white">
                            <section class="col-12 col-lg-4 border-lg-left blue-gray-200 font-weight-bold">
                                فروشگاه
                            </section>
                            <section class="col-12 col-lg-8 ">
                                {{$itemFactor->getFactorModel()->getStoreName()}}
                            </section>
                        </section>

                        <section class="d-lg-flex d-block border-bottom border gray-300 ">
                            <section class="col-12 col-lg-4 border-lg-left  border-white gray-100 font-weight-bold">
                                خریدار
                            </section>
                            <section class="col-12 col-lg-8 ">
                                {{$itemFactor->getFactorModel()->getCustomerName()}}
                            </section>
                        </section>

                        <section class="d-lg-flex d-block border-bottom border blue-gray-300 text-white border-white">
                            <section class="col-12 col-lg-4 border-lg-left blue-gray-200 font-weight-bold">
                                مبلغ کل
                            </section>
                            <section class="col-12 col-lg-8 ">
                                {{$itemFactor->getTotalPrice()}}
                            </section>
                        </section>



                        <section onclick="selectUserFactorInfo('{{$itemFactor->getFactorModel()->getResNum()}}')" title="مشاهده" class="btn-one btn-panel cursor-pointer position-absolute bg-warning border border-dark rounded shadow">
                            <i class="fa fa-eye position-absolute"></i>
                        </section>

                        <form  method="post" action="{{route("customer-panel.factors.delete-user-factor" , $itemFactor->getFactorModel()->getResNum())}}" >
                            @csrf
                            @method("delete")

                            <section onclick="goToConfirmDeleteForm(this)" title="حذف" class="btn-two btn-panel cursor-pointer position-absolute bg-danger border border-dark rounded shadow">
                                <i class="fa fa-trash position-absolute text-white"></i>
                            </section>
                        </form>

                        <a href="{{route("customer-panel.factors.download-user-factor" , $itemFactor->getFactorModel()->getResNum())}}" title="دانلود" class="btn-three btn-panel  cursor-pointer position-absolute bg-info border border-dark rounded shadow">
                            <i class="fa fa-download position-absolute text-white"></i>
                        </a>

                    </section>
                </section>

            @endforeach

        </section>

        <x-row-tables.admin.component-pageinate-panels
                :list="$realFactor"/>

    </section>
@else
    <x-component-not-exist-item
            title="فاکتوری"/>
@endif

<a href="{{route("customer.create-factor.index")}}"  class="float-left font-size-md btn btn-success rounded  text-white text-center mt-2 py-1 shadow">
    فاکتور جدید
</a>