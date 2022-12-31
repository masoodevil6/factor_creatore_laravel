<section class="border border-dark shadow bg-white mt-2">

    @if($user->mobile == "")

        <section class="border-bottom border-dark color-family-1 text-center text-white font-size-md">
            تایید شماره موبایل
        </section>

        <x-fields.component-input-insert
                title-en="phone"
                title-fa="شماره موبایل"
                :value="$user->phone" />

        <section class="mt-2 pb-3 ">
            <button type="button" data-type="phone" onclick="submitEmailOrPhoneForVerify(this)" class="btn-submit-data btn btn-primary btn-sm mt-1 mx-3 font-size-12" >
                ثبت موبایل
            </button>
        </section>

    @else

        <section class="border-bottom border-dark color-family-1 text-center text-white ">
            شماره موبایل تایید شده
        </section>

        <p class="mx-2 my-1 text-center gray-300 font-size-md">
            {{$user->mobile}}
        </p>

    @endif

</section>