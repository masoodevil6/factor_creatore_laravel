

<section class="border border-dark shadow bg-white mt-2 mt-md-0">

    <section class="border border-dark shadow bg-white mt-md-0 py-1 bg-white d-flex">

        <section onclick="goBackPersonalPanelClient()" class="border border-dark rounded float-right cursor-pointer shadow color-family-c-1 mx-2">
            <i class="icon-back-panel fa fa-arrow-right px-2 my-1 text-white" aria-hidden="true"></i>
        </section>

        <section id="title-verify-code-email-or-phone" class="float-right py-1 mx-2">
            تایید
        </section>

    </section>

    <section class="mx-2 ">


        <x-fields.component-input-insert
                title-en="code"
                title-fa="کد اعتبار سنجی"
                value="" />

        <section class="mt-2 pb-1 border-top border-dark gray-200">
            <button type="button" onclick="checkVerifyCodeMobileOrEmail()" class="btn-submit-data btn btn-primary btn-sm mt-1 mx-3 font-size-12" >
                بررسی و اعمال کد
            </button>
        </section>

    </section>

</section>