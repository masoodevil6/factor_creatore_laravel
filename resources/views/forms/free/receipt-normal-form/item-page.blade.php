@foreach($infoPage["products"] as $itemProduct )

    <div class="item-page d-flow-root">
        <div class="border-success border-3 rounded " style="/*height: calc(100% - 10px);*/ margin: 5px">

            <h2 class="text-center m-2">
                قبض پرداخت صندوق
            </h2>


            <div class="d-flow-root mt-4  mx-3">

                <div class="w-65 float-right">

                    <p class="font_3 line_height_3  p-0 m-0 ml-2 text-right float-right w-15 font-weight-bold">
                        تاریخ
                    </p>

                    <div class="d-flow-root">
                        <p class="font_3 line_height_2  ml-5 py-0 my-0 pr-3 border-dash-bottom-dark">
                            {{$factor->getCreatedAtJalili()}}
                        </p>
                    </div>

                </div>

                <div class="d-flow-root">
                    <p class="font_3 line_height_3 p-0 m-0  text-right float-right w-30 text-danger font-weight-bold">
                        شماره
                    </p>

                    <div class="d-flow-root">

                        <p class="font_3   pr-3 my-0  d-flow-root  line_height_3 text-danger font-weight-bold">
                            {{$factor->getResNum()}}
                        </p>
                    </div>

                </div>

            </div>




            <div class="d-flow-root mt-3 mx-3">


                <div class="w-45 float-right">

                    <p class="font_1 line_height_3 p-0 m-0  text-right float-right w-15 font-weight-bold">
                        مبلغ
                    </p>

                    <div class="d-flow-root">
                        <p class="font-size-normal  py-0 my-0 pr-3 border-dash-bottom-dark">
                            {{$itemProduct->getProductTotalPriceText()}}
                        </p>
                    </div>


                </div>

                <div class="d-flow-root">

                    <p class="font_1 line_height_3 p-0 m-0  text-right float-right w-30 font-weight-bold">
                        طی نقدا/چک
                    </p>

                    <div class="d-flow-root">
                        <p class="font-size-normal  py-0 my-0 pr-3 border-dash-bottom-dark">

                        </p>
                    </div>


                </div>





                <div class="w-55 float-right">

                    <p class="font_1 line_height_3 p-0 m-0  text-right float-right w-35 font-weight-bold">
                        در وجه آقا/خانم
                    </p>

                    <div class="d-flow-root">
                        <p class="font-size-normal  py-0 my-0 pr-3 border-dash-bottom-dark">
                            {{$factor->getStoreName()}}
                        </p>
                    </div>

                </div>

                <div class="d-flow-root">

                    <p class="font_1 line_height_3 p-0 m-0  text-right float-right w-15 font-weight-bold">
                        توسط
                    </p>

                    <div class="d-flow-root">
                        <p class="font-size-normal  py-0 my-0 pr-3 border-dash-bottom-dark">
                            {{$factor->getCustomerName()}}
                        </p>
                    </div>
                </div>



                <div class="w-80 float-right">

                    <p class="font_1 line_height_3 p-0 m-0  text-right float-right w-8 font-weight-bold">
                        بابت
                    </p>

                    <div class="d-flow-root">
                        <p class="font-size-normal  py-0 my-0 pr-3 border-dash-bottom-dark">
                            {{$itemProduct->getProductName()}}
                        </p>
                    </div>

                </div>

                <p class="d-flow-root font_1 line_height_3   p-0 m-0  text-left font-weight-bold">
                    پرداخت گردید
                </p>



                <p class="d-flow-root font_1 line_height_3  p-0 m-0 ml-2 text-right  float-right font-weight-bold">
                    و مبلغ فوق دریافت گردید.
                </p>


            </div>




            <div class="d-flow-root mt-3  mx-3 height_120_px">

                <div class="w-65 float-right">

                    <p class="font_1 line_height_3  p-0 m-0 ml-2 text-right font-weight-bold">
                        امضا پرداخت کننده
                    </p>

                </div>

                <div class="d-flow-root">
                    <p class="font_1 line_height_3  p-0 m-0  text-right  font-weight-bold">
                        مهر
                    </p>

                    <div class="d-block w-100 position-relative" >
                        @if(!empty($factor->getMohrName()))
                            <img src="{{$factor->getMohrName()}}" height="75" class="ml-5  float-left" style="transform: rotate(-2deg)">
                        @endif
                    </div>

                </div>

            </div>




        </div>
    </div>

@endforeach