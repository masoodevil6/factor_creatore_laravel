<section class=" border border-dark shadow mt-2 p-0 rounded bg-white">


    <form action="{{route("customer.create-factor.submit-info-factor")}}" method="post"  class="m-2 row">
        @csrf

        <section class="col-12 col-lg-6 ">
            <section class="  border border-dark pb-2">
                <p class="bg-dark text-white text-center font-size-lg mb-0">
                    اطلاعات فروشگاه
                </p>


                <section class="col-12 py-2 bg-warning border-bottom border-dark">

                    <select onchange="changeUserStroeSelected(this)" class="form-control form-control-sm form-text font-size-12" aria-label="Default select example">

                        <option class="bg-secondary text-white" value="">
                            جستجو از موارد ذخیره شده
                        </option>

                        @foreach($userStores as $itemUserStore)
                            <option value="{{$itemUserStore->id}}">
                                {{$itemUserStore->name}}
                            </option>
                        @endforeach

                    </select>

                </section>


                <section id="info-store-user">

                    @include("factor-creator.info.info-store")

                </section>
            </section>

        </section>


        <section class="col-12 col-lg-6 mt-2 mt-lg-0">

            <section class=" border border-dark pb-2">
                <p class="bg-dark text-white text-center font-size-lg mb-1">
                    اطلاعات مشتری
                </p>

                <x-fields.component-input-insert
                        title-en="customer_name"
                        title-fa="نام مشتری"
                        :full="true"
                        :value="(isset($factor->customer_name)) ? $factor->customer_name : '' " />

                <x-fields.component-input-insert
                        title-en="customer_phone"
                        title-fa="شماره مشتری"
                        :full="true"
                        :value="(isset($factor->customer_phone)) ? $factor->customer_phone : '' " />

                <x-fields.component-input-insert
                        title-en="customer_address"
                        title-fa="آدرس مشتری"
                        :full="true"
                        :value="(isset($factor->customer_address)) ? $factor->customer_address : '' " />
            </section>

        </section>


        <section class="col-12 mt-2">
            <section class="  border border-dark pb-2">

                <x-fields.component-sk-editor
                        title-en="description"
                        title-fa="توضیحات تکمیلی"
                        :ck-editor="0"
                        :row="3"
                        :value="(isset($factor->description)) ? $factor->description : '' " />

            </section>
        </section>



        <section class="w-100 row mt-2 mx-2">


            <section class="col-12 col-lg-4">

            </section>


            <section class="col-12 col-lg-4"></section>


            <section class="col-12 col-lg-4">

                <button type="submit" class="btn btn-info text-white   p-1 m-0 m-2 shadow text-center font-size-md  border border-dark text-hover-white  px-2 font-weight-bold font-size-md float-left">
                    تایید و ادامه
                    <i class="fa fa-arrow-left mr-1 border border-white  rounded p-1"></i>
                </button>

            </section>


        </section>




    </form>


</section>