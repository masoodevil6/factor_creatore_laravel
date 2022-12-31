<section class="border border-dark shadow bg-white mt-2 mt-lg-0">

    <section class="border-bottom border-dark color-family-1 text-center text-white">
        اطلاعات کاربری
    </section>

    <section class="mx-2  font-size-md">
        <x-fields.component-from-data
                :action='route("customer-panel.persional-info.change-info")'>

            <x-fields.component-input-insert
                    title-en="name"
                    title-fa="نام کوچک *"
                    :value="$user->name" />

            <x-fields.component-input-insert
                    title-en="family"
                    title-fa="نام خانوادگی *"
                    :value="$user->family" />

        </x-fields.component-from-data>
    </section>

</section>