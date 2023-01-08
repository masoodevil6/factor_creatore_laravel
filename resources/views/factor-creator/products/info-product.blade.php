<section class=" border border-dark shadow mt-2 p-0 rounded bg-white">

    <p class="bg-dark text-white text-center font-size-lg mb-0">
        اطلاعات کالا
    </p>

    <form action="{{route("customer.products-factor.add-factor-product")}}" method="post" class="m-2 row">
        @csrf

        @if(isset($product->id))
            <input type="hidden" name="id" value="{{$product->id}}">
        @endif

        <section class="col-12 mt-2">

            @if(isset($product->name))
                <p class="mx-2 font-size-lg bg-warning p-2 rounded border border-dark shadow">
                    اصلاح کالای:
                    <span class="font-weight-bold mr-2">
                        {{$product->name}}
                    </span>
                </p>
            @endif

            <section class="  border border-dark pb-2">



                <x-fields.component-input-insert
                        title-en="name"
                        title-fa="نام کالا"
                        :full="true"
                        :value="(isset($product->name)) ? $product->name : '' " />
            </section>

        </section>

        <section class="col-12 col-lg-6 mt-2">

            <section class="  border border-dark pb-2">

                <x-fields.component-input-insert
                        title-en="num"
                        type="number"
                        title-fa="تعداد"
                        :full="true"
                        :method-on-change="true"
                        :value="(isset($product->num)) ? $product->num : '0' " />

            </section>


            <section class="  border border-dark pb-2 mt-2">

                <section class="col-12 py-2 bg-warning border-bottom border-dark">

                    <label for="select-option-unit" class="d-block text-right font-size-12">
                        جستجو واحد
                    </label>


                    <select onchange="changeUnitProduct(this)" id="select-option-unit" class="form-control form-control-sm form-text font-size-12" aria-label="Default select example">

                        <option value="">
                            [شخصی]
                        </option>

                        @foreach($units as $itemUnit)
                            <option value="{{$itemUnit->name}}">
                                {{$itemUnit->name}}
                            </option>
                        @endforeach

                    </select>

                </section>

                <x-fields.component-input-insert
                        title-en="unit"
                        title-fa="واحد"
                        :full="true"
                        :value="(isset($product->unit)) ? $product->unit : '' " />

            </section>

        </section>

        <section class="col-12 col-lg-6 mt-2">

            <section class=" border border-dark pb-2">

                <x-fields.component-input-insert
                        title-en="price"
                        type="number"
                        title-fa="قیمت واحد"
                        :full="true"
                        :method-on-change="true"
                        :value="(isset($product->price)) ? $product->price : '0' " />

                <p id="text-product-price" class="text-right text-danger font-size-lg p-2 py-1 mb-1">
                    @if(isset($product->price))
                        {{$product->price_text}}
                    @else
                        0
                    @endif
                    {{$passPrice}}
                </p>


                <x-fields.component-input-insert
                        title-en="off"
                        type="number"
                        title-fa="تخفیف"
                        :full="true"
                        :method-on-change="true"
                        :value="(isset($product->off)) ? $product->off : '0' " />

                <p id="text-product-off" class="text-right text-danger font-size-lg p-2 py-1 mb-1">
                    @if(isset($product->off_text))
                        {{$product->off_text}}
                    @else
                        0
                    @endif
                    {{$passPrice}}
                </p>



                <p class="bg-dark text-white text-center font-size-lg mb-0">
                    جمع کل واحد
                </p>

                <p id="text-product-total-one" class="text-right text-danger font-size-lg p-2 py-1 mb-1">
                    @if(isset($product->total_one_text))
                        {{$product->total_one_text}}
                    @else
                        0
                    @endif
                    {{$passPrice}}
                </p>

                <p class="bg-dark text-white text-center font-size-lg mb-0">
                    جمع کل
                </p>

                <p id="text-product-total" class="text-right text-danger font-size-lg p-2 py-1 mb-1">
                    @if(isset($product->total_text))
                        {{$product->total_text}}
                    @else
                        0
                    @endif
                    {{$passPrice}}
                </p>

            </section>

        </section>


        <button type="submit" class="btn btn-info text-white   p-1 m-0 m-2 shadow text-center font-size-md  border border-dark text-hover-white  px-2 font-weight-bold font-size-md ">
            ذخیره اطلاعات
            <i class="fa fa-check mr-1 border  border-white  rounded p-1"></i>
        </button>

    </form>

</section>