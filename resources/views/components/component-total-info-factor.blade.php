<div class="row my-2">

    <div class="col-12 col-md-9">

    </div>

    <div class="col-12 col-md-3 ">

        <span class="d-block text-danger text-bold text-center font-size-lg" style="font-weight: bold;">
            {{$factorInfo->getResNum()}}
        </span>

        <span class="d-block text-dark text-bold text-center font-size-md">
            {{$factorInfo->getCreatedAtJalili()}}
        </span>

    </div>

</div>


<div class="row">

    <div class="col-12 col-md-6">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <tr>
                <th colspan="2" class="w-5  font-size-12 text-center py-1">فروشگاه</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td class="font-size-12 py-1">
                    نام
                </td>
                <td class="font-size-lg text-center py-1">
                    {{$factorInfo->getStoreName()}}
                </td>
            </tr>
            <tr>
                <td class="font-size-12 py-1">
                    تلفن
                </td>
                <td class="font-size-lg text-center py-1">
                    {{$factorInfo->getStorePhone()}}
                </td>
            </tr>
            <tr>
                <td class="font-size-12 py-1">
                    آدرس
                </td>
                <td class="font-size-lg text-center py-1">
                    {{$factorInfo->getStoreAddress()}}
                </td>
            </tr>

            </tbody>
        </table>
    </div>


    <div class="col-12 col-md-6  ">

        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
            <tr>
                <th colspan="2" class="w-5  font-size-12 text-center py-1">خریدار</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td class="font-size-12 py-1">
                    نام
                </td>
                <td class="font-size-lg text-center py-1">
                    {{$factorInfo->getCustomerName()}}
                </td>
            </tr>
            <tr>
                <td class="font-size-12 py-1">
                    تلفن
                </td>
                <td class="font-size-lg text-center py-1">
                    {{$factorInfo->getCustomerPhone()}}
                </td>
            </tr>
            <tr>
                <td class="font-size-12 py-1">
                    آدرس
                </td>
                <td class="font-size-lg text-center py-1">
                    {{$factorInfo->getCustomerAddress()}}
                </td>
            </tr>

            </tbody>
        </table>

    </div>

</div>


<div class="table-responsive px-3">
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
        <tr>
            <th scope="col" class="w-5   font-size-12 py-1">ردیف</th>
            <th scope="col" class="w-20  font-size-12 py-1">نام کالا</th>
            <th scope="col" class="w-15  font-size-12 py-1">تعداد</th>
            <th scope="col" class="w-20  font-size-12 py-1">قیمت واحد</th>
            <th scope="col" class="w-20  font-size-12 py-1">تخفیف</th>
            <th scope="col" class="w-20  font-size-12 py-1">قیمت کل</th>
        </tr>
        </thead>
        <tbody>

        @foreach($products As $key => $product)

            <tr>
                <td class="font-size-12 py-1">
                    {{$key + 1}}
                </td>
                <td class="font-size-12 py-1" style="font-weight: bold;">
                    {{$product->getProductName()}}
                </td>
                <td class="font-size-12 py-1">
                    {{$product->getProductNumUnitText()}}
                </td>
                <td class="font-size-12 py-1">
                    {{$product->getProductPriceText()}}
                </td>
                <td class="font-size-12 py-1">
                    {{$product->getProductOffText()}}
                </td>
                <td class="font-size-12 py-1" style="font-weight: bold;">
                    {{$product->getProductTotalPriceText()}}
                </td>

            </tr>
        @endforeach

        <tr class="table-info ">
            <td colspan="3" class="font-size-12 py-1">
                جمع کل
            </td>
            <td colspan="3" class="font-size-lg font-bold text-center py-1" style="font-weight: bold;">
                {{$totalPrice}}
            </td>
        </tr>

        </tbody>
    </table>
</div>