<div class="d-flow-root">

    <div class="w-60 float-right">
        @if(!empty($factor->getLogoName()))
            <img src="{{$factor->getLogoName()}}" height="60" class="float-right">
        @endif
    </div>

    <div class="d-flow-root">

        <p class="m-0 text-center text-danger  font-size-normal  ">
            {{$factor->getResNum()}}
        </p>

        <p class="m-0 text-center  font-size-normal">
            {{$factor->getCreatedAtJalili()}}
        </p>

        <p class="m-0 text-center  font-size-normal">
            (
            صفحه
            {{$infoPage["page"]}}
            )
        </p>

    </div>

</div>


<div class="d-flow-root ">

    <div class="w-50 float-right">

        <div class="border border-2 border-dark d-block  rounded w-95  float-right">

            <div class="d-flow-root w-100 border-bottom-2 border-dark border-bottom    border_width_1 " >
                <p class="text-center font-size-normal  font-weight-bold d-block p-0 m-0">فروشگاه</p>
            </div>

            <div class="d-flow-root w-100  border-bottom    border_width_1 ">
                <div  class=" w-25 float-right  p-0">
                    <p class="font-size-normal  border-left-2 border-dark p-0 m-0  text-center">
                        نام
                    </p>
                </div>
                <div class="w-75 float-right  p-0 ">
                    <p class="font-size-normal  px-2 py-0 m-0 ">
                        {{$factor->getStoreName()}}
                    </p>
                </div>
            </div>

            <div class="d-flow-root w-100  border-bottom    border_width_1 ">
                <div  class=" w-25 float-right  p-0">
                    <p class="font-size-normal  border-left-2 border-dark p-0 m-0  text-center">
                        تلفن
                    </p>
                </div>
                <div class="w-75 float-right  p-0 ">
                    <p class="font-size-normal  px-2 py-0 m-0 ">
                        {{$factor->getStorePhone()}}
                    </p>
                </div>
            </div>

            <div class="d-flow-root w-100  border-bottom    border_width_1 ">
                <div  class=" w-25 float-right  p-0">
                    <p class="font-size-normal  border-left-2 border-dark p-0 m-0  text-center">
                        آدرس
                    </p>
                </div>
                <div class="w-75 float-right  p-0 ">
                    <p class="font-size-normal  px-2 py-0 m-0 ">
                        {{$factor->getStoreAddress()}}
                    </p>
                </div>
            </div>

        </div>

    </div>

    <div class="w-50 float-right">

        <div class="border border-2 border-dark d-block  rounded w-95 float-left">

            <div class="d-flow-root w-100 border-bottom-2 border-dark border-bottom   border_width_1 " >
                <p class="text-center font-size-normal  font-weight-bold d-block p-0 m-0">خریدار</p>
            </div>

            <div class="d-flow-root w-100  border-bottom    border_width_1 ">
                <div  class=" w-25 float-right  p-0">
                    <p class="font-size-normal  border-left-2 border-dark p-0 m-0  text-center">
                        نام
                    </p>
                </div>
                <div class="w-75 float-right  p-0 ">
                    <p class="font-size-normal  px-2 py-0 m-0 ">
                        {{$factor->getCustomerName()}}
                    </p>
                </div>
            </div>

            <div class="d-flow-root w-100  border-bottom    border_width_1 ">
                <div  class=" w-25 float-right  p-0">
                    <p class="font-size-normal  border-left-2 border-dark p-0 m-0  text-center">
                        تلفن
                    </p>
                </div>
                <div class="w-75 float-right  p-0 ">
                    <p class="font-size-normal  px-2 py-0 m-0 ">
                        {{$factor->getCustomerPhone()}}
                    </p>
                </div>
            </div>

            <div class="d-flow-root w-100  border-bottom    border_width_1 ">
                <div  class=" w-25 float-right  p-0">
                    <p class="font-size-normal  border-left-2 border-dark p-0 m-0  text-center">
                        آدرس
                    </p>
                </div>
                <div class="w-75 float-right  p-0 ">
                    <p class="font-size-normal  px-2 py-0 m-0 ">
                        {{$factor->getCustomerAddress()}}
                    </p>
                </div>
            </div>

        </div>

    </div>

</div>


<div class="d-flow-root  border border-2 border-dark  mt-3 ">

    <div class="d-flow-root   border-bottom-2 border-dark ">
        <div  class=" w-5 float-right  p-0">
            <p class=" border-left-2 border-dark p-0 m-0  text-center font-size-normal  font-weight-bold">
                #
            </p>
        </div>
        <div class="w-25 float-right  p-0 ">
            <p class=" border-left-2 border-dark p-0 m-0  text-center font-size-normal  font-weight-bold">
                نام کالا
            </p>
        </div>
        <div class="w-10 float-right  p-0 ">
            <p class=" border-left-2 border-dark p-0 m-0  text-center font-size-normal  font-weight-bold">
                تعداد
            </p>
        </div>
        <div class="w-20 float-right  p-0 ">
            <p class=" border-left-2 border-dark p-0 m-0  text-center font-size-normal  font-weight-bold">
                قیمت واحد
            </p>
        </div>
        <div class="w-20 float-right  p-0 ">
            <p class=" border-left-2 border-dark p-0 m-0  text-center font-size-normal  font-weight-bold">
                تخفیف
            </p>
        </div>
        <div class="d-flow-root  p-0 ">
            <p class=" p-0 m-0  text-center font-size-normal  font-weight-bold">
                قیمت کل
            </p>
        </div>
    </div>


    @foreach($infoPage["products"] as $itemProduct )

        <div class="d-flow-root  border-bottom-1 border-bottom ">
            <div  class=" w-5 float-right  p-0">
                <p class=" border-left-1 border-left p-0 m-0  text-center font-size-normal height-normal ">
                    {{$itemProduct->key_page}}
                </p>
            </div>
            <div class="w-25 float-right  p-0 ">
                <p class=" border-left-1 border-left p-0 m-0  text-center font-size-normal height-normal ">
                    {{$itemProduct->getProductName()}}
                </p>
            </div>
            <div class="w-10 float-right  p-0 ">
                <p class=" border-left-1 border-left p-0 m-0  text-center font-size-normal height-normal ">
                    {{$itemProduct->getProductNumUnitText()}}
                </p>
            </div>
            <div class="w-20 float-right  p-0 ">
                <p class=" border-left-1 border-left p-0 m-0  text-center font-size-normal height-normal">
                    {{$itemProduct->getProductPriceText()}}
                </p>
            </div>
            <div class="w-20 float-right  p-0 ">
                <p class=" border-left-1 border-left p-0 m-0  text-center font-size-normal  height-normal">
                    {{$itemProduct->getProductOffText()}}
                </p>
            </div>
            <div class="d-flow-root  p-0 ">
                <p class=" p-0 m-0  text-center font-size-normal  height-normal ">
                    {{$itemProduct->getProductTotalPriceText()}}
                </p>
            </div>
        </div>

    @endforeach







    <div class="d-flow-root w-100  border-top-2 border-dark  ">
        <div  class=" w-40 float-right  p-0">
            <p class="  border-left-2 border-dark p-0 m-0  font-size-normal line_height_3  text-center">
                جمع کل [تمام صفحات]
            </p>
        </div>
        <div class="w-60 float-right  p-0 ">
            <p class=" px-2 py-0 m-0  font-size-normal  line_height_3  text-center">
                {{$totalPrice}}
            </p>
        </div>
    </div>

</div>


<div class="d-flow-root mt-3">

    <div class="w-50 float-right ">

        <div class="w-100 border border-2 border-dark height_120_px ">
            <div class="d-flow-root w-100 " >
                <p class="text-right font-size-normal  font-weight-bold d-block px-1 m-0">توضیحات</p>
            </div>

            <div class="d-flow-root w-100 " >
                <p class="text-right  font-size-normal   d-block px-1 m-0">
                    {{$factor->getDescription()}}
                </p>
            </div>
        </div>

    </div>


    <div class="w-50 float-right ">

        <div class="d-block w-100 " >
            <p class="text-center font-size-normal  font-weight-bold d-block px-1 m-0">مهر </p>
        </div>

        <div class="d-block w-100 position-relative" >
            @if(!empty($factor->getMohrName()))
                <img src="{{$factor->getMohrName()}}" height="75" class="ml-5 mt-2 float-left" style="transform: rotate(-50rad)">
            @endif
        </div>

    </div>

</div>