<section class="border border-dark shadow bg-white mt-2">

    @if($user->email == "")

        <section class="border-bottom border-dark color-family-1 text-center text-white font-size-md">
            تایید ایمیل
        </section>

        <x-fields.component-input-insert
                title-en="email"
                title-fa="ایمیل"
                :value="$user->email" />

        <section class="mt-2 pb-3">
            <button type="button" data-type="email" onclick="submitEmailOrPhoneForVerify(this)" class="btn-submit-data btn btn-primary btn-sm mt-1 mx-3 font-size-12" >
                ثبت ایمیل
            </button>
        </section>

    @else

        <section class="border-bottom border-dark color-family-1 text-center text-white ">
            ایمیل تایید شده
        </section>

        <p class="mx-2 my-1 text-center gray-300 font-size-md">
            {{$user->email}}
        </p>

    @endif

</section>