<section class="pb-2 ">

    <p class="bg-dark text-white text-center font-size-lg mb-0 py-1">
        تصویر لوگو شرکت (برند)
    </p>


    <section class="row m-2">

        <section class="col-12 col-lg-6 py-1 bg-warning rounded row m-0 border border-dark">

            <section class="col-4">
                <label for="select-option-type-logo" class="float-right text-right font-size-12 line-height-30 m-0">
                    انتخاب نوع ذخیر لوگو
                </label>
            </section>
            <section class="col-8">
                <select onchange="changeTypeLogoName(this)" id="select-option-type-logo" name="type_image_name" class="float-right form-control form-control-sm form-text font-size-12 my-0" aria-label="Default select example">

                    <option value="-1" @if($defaultTypeLogo == -1) selected @endif>
                        بدون تصویر لوگو
                    </option>

                    @if($userLogo)
                        <option value="0" @if($defaultTypeLogo == 0) selected @endif>
                            تصویر لوگوی پیش فرض
                        </option>
                    @endif

                    <option value="1" @if($defaultTypeLogo == 1) selected @endif>
                        آپلود لوگو جدید
                    </option>

                </select>
            </section>

        </section>

        @if($userLogo)
            @include("factor-creator.images.logo.section-default-logo-name")
        @endif

        @include("factor-creator.images.logo.section-upload-logo-name")

    </section>


</section>