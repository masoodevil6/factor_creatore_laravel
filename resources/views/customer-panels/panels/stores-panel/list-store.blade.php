@if(sizeof($stores) > 0)
<section class="border border-dark shadow bg-white mt-2 mt-lg-0 ">

    <section class="border-bottom border-dark color-family-1 text-center text-white">
        فروشگاه ها
    </section>

    <section id="form_list_main_tickets" class="mx-5 mx-lg-2 my-3 row ">

        @foreach($stores As $key => $itemStore)

            <section class="col-12 col-lg-6 p-0 ">
                <section  class="item-panel border border-dark m-2  shadow font-size-md position-relative">
                    <section class="d-lg-flex d-block d-inline border-bottom border gray-300">
                        <section class="col-12 col-lg-4 border-lg-left border-white gray-100 font-weight-bold">
                            شماره
                        </section>
                        <section class="col-12 col-lg-8 ">
                            {{$key + 1}}
                        </section>
                    </section>

                    <section class="d-lg-flex d-block border-bottom border blue-gray-300 text-white border-white">
                        <section class="col-12 col-lg-4 border-lg-left blue-gray-200 font-weight-bold">
                            عنوان
                        </section>
                        <section class="col-12 col-lg-8 ">
                            {{$itemStore->name}}
                        </section>
                    </section>

                    <section class="d-lg-flex d-block border-bottom border gray-300 ">
                        <section class="col-12 col-lg-4 border-lg-left  border-white gray-100 font-weight-bold">
                            تماس
                        </section>
                        <section class="col-12 col-lg-8 ">
                            {{$itemStore->phone}}
                        </section>
                    </section>

                    <section class="d-lg-flex d-block border-bottom border blue-gray-300 text-white border-white">
                        <section class="col-12 col-lg-4 border-lg-left blue-gray-200 font-weight-bold">
                            آدرس
                        </section>
                        <section class="col-12 col-lg-8 ">
                            {{$itemStore->address}}
                        </section>
                    </section>

                    <section onclick="selectUserStoreInfo({{$itemStore->id}})" class="btn-one btn-panel cursor-pointer position-absolute bg-warning border border-dark rounded shadow">
                        <i class="fa fa-edit position-absolute"></i>
                    </section>

                    <form  method="post" action="{{route("customer-panel.stores.delete-user-store" , $itemStore->id)}}" >
                        @csrf
                        @method("delete")

                        <section onclick="goToConfirmDeleteForm(this)" class="btn-two btn-panel cursor-pointer position-absolute bg-danger border border-dark rounded shadow">
                            <i class="fa fa-trash position-absolute text-white"></i>
                        </section>
                    </form>


                </section>
            </section>

        @endforeach

    </section>

</section>
@else
    <x-component-not-exist-item
            title="فروشگاهی"/>
@endif

<section onclick="selectUserStoreInfo()"  class="float-left font-size-md btn btn-success rounded  text-white text-center mt-2 py-1 shadow">
    فروشگاه جدید
</section>