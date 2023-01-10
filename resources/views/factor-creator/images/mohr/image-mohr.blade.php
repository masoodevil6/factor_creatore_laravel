<section class="pb-2 ">

    <p class="bg-dark text-white text-center font-size-lg mb-0 py-1">
        تصویر مهر شرکت (برند)
    </p>


    <section class="row m-2">



        <section class="col-12 col-lg-6 py-1 bg-warning rounded row m-0 border border-dark">

            <section class="col-4">
                <label for="select-option-type-mohr" class="float-right text-right font-size-12 line-height-30 m-0">
                    انتخاب نوع ذخیره  مهر
                </label>
            </section>
            <section class="col-8">
                <select onchange="changeTypeMohtName(this)" id="select-option-type-mohr" name="type_image_name" class="float-right form-control form-control-sm form-text font-size-12 my-0" aria-label="Default select example">

                    <option value="-1" @if($defaultTypeMohr == -1) selected @endif>
                        بدون تصویر مهر
                    </option>

                    @if($userMohr)
                        <option value="0" @if($defaultTypeMohr == 0) selected @endif>
                            تصویر مهر پیش فرض
                        </option>
                    @endif

                    <option value="1" @if($defaultTypeMohr == 1) selected @endif>
                        آپلود مهر جدید
                    </option>

                </select>
            </section>

        </section>

        @if($userMohr)
            @include("factor-creator.images.mohr.section-default-mohr-name")
        @endif


        @include("factor-creator.images.mohr.section-upload-mohr-name")

    </section>


</section>