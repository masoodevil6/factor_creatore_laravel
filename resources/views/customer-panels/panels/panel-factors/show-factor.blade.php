<section class="border border-dark shadow bg-white mt-lg-0 mt-2 py-1 bg-white d-flex">

    <section onclick="goBackFromShowFactorClient()" class="border border-dark rounded float-right cursor-pointer shadow color-family-c-1 mx-2">
        <i class="icon-back-panel fa fa-arrow-right px-2 my-1 text-white" aria-hidden="true"></i>
    </section>

    <section id="title-verify-code-email-or-phone" class="float-right py-1 mx-2">
        اطلاعات اشتراک
    </section>

</section>

<section class=" border border-dark shadow bg-white mt-2 py-1 bg-white row px-2 m-0 d-block">

    <x-component-total-info-factor
            :factor-info='$factor->getFactorModel()'
            :products="$factor -> getProducts()"
            :total-price="$factor -> getTotalPrice()"/>

</section>


<a href="{{route("customer-panel.factors.download-user-factor" , $factor->getFactorModel()->getResNum())}}" type="submit" class="float-left font-size-md btn btn-success rounded  text-white text-center mt-2 py-1 shadow mr-2">
    <i class="fa fa-download text-white"></i>
    دانلود
</a>

<form  method="post" action="{{route("customer-panel.factors.delete-user-factor" , $factor->getFactorModel()->getResNum())}}" >
    @csrf
    @method("delete")

    <section onclick="goToConfirmDeleteForm(this)" title="حذف" class="float-left font-size-md btn btn-danger rounded  text-white text-center mt-2 py-1 shadow">
        <i class="fa fa-trash text-white"></i>
        حذف
    </section>
</form>



