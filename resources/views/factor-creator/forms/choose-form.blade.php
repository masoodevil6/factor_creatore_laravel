<section class=" border border-dark shadow mt-2 p-0 rounded bg-white">

    <section class="m-2 row">

        <section class="col-12 col-lg-6">

            <section class="d-block">

                <label for="select-option-form-categories" class="d-block text-right font-size-12">
                    دسته بندی
                </label>

                <select onchange="changeFormCategory(this)" id="select-option-form-categories" class=" form-control form-control-sm form-text font-size-12" aria-label="Default select example">
                    @foreach($formCategories as $itemFormCategory)
                        <option value="{{$itemFormCategory->id}}" @if($formCategoryId != null && $formCategoryId == $itemFormCategory->id) selected @endif > {{$itemFormCategory->title}} </option>
                    @endforeach
                </select>

            </section>

            <section id="section-select-form" class="d-block">
                @include("factor-creator.forms.forms")
            </section>


        </section>

        <section id="section-info-form" class="col-12 col-lg-6">
            @include("factor-creator.forms.form-info")
        </section>

    </section>

</section>