<section class="border border-dark shadow bg-white mt-lg-0 mt-2 py-1 bg-white d-flex">

    <section onclick="goBackFromSubmitUserStorePanel()" class="border border-dark rounded float-right cursor-pointer shadow color-family-c-1 mx-2">
        <i class="icon-back-panel fa fa-arrow-right px-2 my-1 text-white" aria-hidden="true"></i>
    </section>

    <section id="title-verify-code-email-or-phone" class="float-right py-1 mx-2">
        ارسال تیکت جدید
    </section>

</section>

<section class=" border border-dark shadow bg-white mt-2 py-1 bg-white row px-2 m-0 d-block">

    <x-fields.component-from-data
            :action='route("customer-panel.stores.submit-new-user-store" , $userStore->id)'>

            <x-fields.component-input-insert
                    title-en="name"
                    title-fa="عنوان فروشگاه"
                    :value="$userStore->name" />

            <x-fields.component-input-insert
                    title-en="phone"
                    title-fa="شماره فروشگاه"
                    :value="$userStore->phone" />

            <x-fields.component-input-insert
                    title-en="address"
                    title-fa="آدرس فروشگاه"
                    :value="$userStore->address" />

    </x-fields.component-from-data>

</section>