@extends("admin.layouts.master")
@section("titlePage" , "ادمین- تنظیمات")

@section("head-tag")

@endsection


@section("content")

    <section class="row p-0 m-0">
        <section class="main-body-container col-12 my-2">

            <section class="main-body-container-header">
                <h5>
                    تنظیمات
                </h5>
            </section>

            <section class="mt-2">

                <x-fields.component-from-data
                        :action=' route("admin.public.setting.update")'
                        enctype="multipart/form-data">

                    @foreach($settings As $itemSetting)

                        @if($itemSetting -> titleEn != "about_us")
                            <x-fields.component-input-insert
                                    :title-en="$itemSetting -> titleEn"
                                    :title-fa="$itemSetting -> titleFa"
                                    :value="isset($itemSetting['value']) ? $itemSetting['value'] : ''" />
                      @endif

                    @endforeach



                    <section class="border border-bottom col-11 mx-auto my-5"></section>

                        @foreach($settings As $itemSetting)

                            @if($itemSetting -> titleEn == "about_us")

                                <x-fields.component-sk-editor
                                        :title-en="$itemSetting -> titleEn"
                                        :title-fa="$itemSetting -> titleFa"
                                        :value="isset($itemSetting['value']) ? $itemSetting['value'] : ''" />

                            @endif

                        @endforeach



                    <section class="border border-bottom col-11 mx-auto my-5"></section>


                    <x-fields.component-upload-image
                            title-en="image"
                            title-fa="تصویر">

                        @if(getLocationLogoSite() != "")
                            <img class="d-block m-auto" src="{{getLocationLogoSite()}}" height="150" alt="تصویر">
                        @endif

                    </x-fields.component-upload-image>

                    <x-fields.component-upload-image
                            title-en="icon"
                            title-fa="ایکون">

                        @if(file_exists("images/site/site.ico"))
                            <img class="d-block m-auto" src="{{asset("images/site/site.ico")}}" height="150" alt="تصویر">
                        @endif

                    </x-fields.component-upload-image>



                </x-fields.component-from-data>

            </section>

        </section>
    </section>

@endsection