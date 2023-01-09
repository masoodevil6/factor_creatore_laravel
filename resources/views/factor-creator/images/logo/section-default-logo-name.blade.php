<section id="section-default-image-logo-user" class="col-12  mt-2 mx-0 @if($factor->type_logo == 0) d-block @else d-none @endif">

    <section class="row  mx-0 border border-dark rounded">

        <section class="col-12 col-lg-6">
            <img src="{{route("customer-panel.logo.show-image-logo")}}" height="100" class="d-block m-auto" alt="تصویر لوگو" style="max-width: 100%">
        </section>

        <section class="col-12 col-lg-6">
            <p class="px-2 py-2 text-right text-justify text-dark">
                <i class="fa fa-check ml-2"></i>
                تصویری
                <span class="mx-1 font-weight-bold">
                    لوگوی
                </span>
                که از قبل در پنل کاربری خود آپلود کرده اید
            </p>
        </section>

    </section>

</section>