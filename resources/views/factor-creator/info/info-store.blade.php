<x-fields.component-input-insert
        title-en="store_name"
        title-fa="نام فروشگاه"
        :full="true"
        :value="(isset($factor->store_name)) ? $factor->store_name : '' " />

<x-fields.component-input-insert
        title-en="store_phone"
        title-fa="شماره فروشگاه"
        :full="true"
        :value="(isset($factor->store_phone)) ? $factor->store_phone : '' " />

<x-fields.component-input-insert
        title-en="store_address"
        title-fa="آدرس فروشگاه"
        :full="true"
        :value="(isset($factor->store_address)) ? $factor->store_address : '' " />
