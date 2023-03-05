<section class=" border border-dark shadow mt-2 p-0 rounded bg-white">

    <p class="bg-dark text-white text-center font-size-lg mb-0">
        اطلاعات کالا
    </p>

    <form id="form-info-product" action="{{route("customer.products-factor.add-factor-product")}}" method="post" class="m-2 row">
        @csrf

        @if(isset($product->id))
            <input type="hidden" name="id" value="{{$product->id}}">
        @endif

        <section class="col-12 mt-2">

            @if(isset($product->name))
                <p class="mx-2 font-size-lg bg-warning p-2 rounded border border-dark shadow">
                    اصلاح کالای:
                    <span class="font-weight-bold mr-2 text-white">
                        {{$product->name}}
                    </span>
                </p>
            @endif

            <section class=" border border-dark pb-2">

                <section class="col-12 mt-2 ">

                    <label for="label-for-name" class="d-block text-right font-size-12">
                        نام کالا
                    </label>

                    <input v-model="name" id="label-for-name" name="name" type="text" placeholder="نام کالا"  class="form-control form-control-sm form-text font-size-12">

                </section>

            </section>

        </section>

        <section class="col-12 col-lg-6 mt-2">

            <section class="  border border-dark pb-2">

                <section class="col-12 mt-2 ">

                    <label for="label-for-num" class="d-block text-right font-size-12">
                        تعداد
                    </label>

                    <input v-model="num" v-on:input="setNumAmdUnit"  id="label-for-num" name="num" type="number" step="0.01"  placeholder="تعداد" style="direction: ltr"  class="text-left form-control form-control-sm form-text font-size-12">

                </section>

                <section class="col-12 py-2 bg-warning border-bottom border-top mt-2 border-dark">

                    <label for="select-option-unit" class="d-block text-right font-size-12">
                        جستجو واحد
                    </label>


                    <select  v-model="unit"   id="select-option-unit" class="form-control form-control-sm form-text font-size-12" aria-label="Default select example">

                        <option value=""></option>

                        @foreach($units as $itemUnit)
                            <option value="{{$itemUnit->name}}">
                                {{$itemUnit->name}}
                            </option>
                        @endforeach

                    </select>

                </section>

                <section class="col-12 mt-2 ">

                    <label for="label-for-unit" class="d-block text-right font-size-12">
                        واحد
                    </label>

                    <input v-model="unit"  v-on:input="setNumAmdUnit"   id="label-for-unit" name="unit" type="text" placeholder="واحد"  class="form-control form-control-sm form-text font-size-12">

                </section>

                <p class="text-right text-danger font-size-lg p-2 py-1 mb-1" v-text="setNumAmdUnit"></p>

            </section>

        </section>

        <section class="col-12 col-lg-6 mt-2">

            <section class="  border border-dark pb-2 mt-2">

                <section class="col-12 mt-2 ">

                    <label for="label-for-price" class="d-block text-right font-size-12">
                        قیمت واحد
                    </label>

                    <input v-model="price"  id="label-for-price" name="price" type="number" placeholder="قیمت واحد" style="direction: ltr" class="text-left form-control form-control-sm form-text font-size-12">

                    <p class="text-right text-danger font-size-lg p-2 py-1 mb-1" v-text="getProductPrice + ' ' + passPrice"></p>

                </section>

                <section class="col-12 mt-2 ">

                    <label for="label-for-off" class="d-block text-right font-size-12">
                        تخفیف
                    </label>

                    <input v-model="off"  id="label-for-off" name="off" type="number" placeholder="تخفیف" style="direction: ltr" class="text-left form-control form-control-sm form-text font-size-12">

                    <p class="text-right text-danger font-size-lg p-2 py-1 mb-1" v-text="getProductOff + ' ' + passPrice"></p>

                </section>

            </section>


            <section class=" border border-dark pb-2">

                <p class="bg-dark text-white text-center font-size-lg mb-0">
                    واحد
                </p>
                <p id="text-product-one" class="text-right text-danger font-size-lg p-2 py-1 mb-1" v-text="getOneProductPrice + ' ' + passPrice"></p>


                <p class="bg-dark text-white text-center font-size-lg mb-0">
                    جمع کل
                </p>
                <p id="text-product-total" class="text-right text-danger font-size-lg p-2 py-1 mb-1" v-text="getProductOff + ' ' + passPrice"></p>

            </section>

        </section>

        <button type="submit" class="btn btn-info text-white   p-1 m-0 m-2 shadow text-center font-size-md  border border-dark text-hover-white  px-2 font-weight-bold font-size-md ">
            ذخیره اطلاعات
            <i class="fa fa-check mr-1 border  border-white  rounded p-1"></i>
        </button>

    </form>

</section>


<script>

    new Vue({
        el:"#form-info-product",
        data: {
            name: '{{(isset($product->name)) ? $product->name : ''}}' ,
            num: '{{(isset($product->num)) ? $product->num : ''}}' ,
            unit: '{{(isset($product->unit)) ? $product->unit : ''}}',
            price: '{{(isset($product->price)) ? $product->price : '0' }}',
            off: '{{(isset($product->off)) ? $product->off : '0' }}' ,
            passPrice: '{{$passPrice}}'
        } ,
        computed:{
            setNumAmdUnit: function () {
                return this.num + " " + this.unit;
            },
            getProductOff: function () {
                var total = this.off;
                if (total > 0){
                    return Intl.NumberFormat().format(total)
                }
                else {
                    return "0";
                }
            },
            getProductPrice: function () {
                var total = this.price;
                if (total !== ""){
                    return Intl.NumberFormat().format(total);
                }
                else {
                    return "0";
                }
            },
            getOneProductPrice: function () {
                var total = this.price - this.off;
                if (total !==""){
                    return Intl.NumberFormat().format(total)
                }
                else {
                    return "0";
                }
            },
            getTotalPrice: function () {
                var total = (this.price - this.off)*this.num;
                if (total !==""){
                    return Intl.NumberFormat().format(total)
                }
                else {
                    return "0";
                }
            }
        }
    });

</script>