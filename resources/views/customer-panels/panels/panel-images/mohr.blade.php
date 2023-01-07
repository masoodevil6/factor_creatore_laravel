<section class="border border-dark shadow bg-white mt-2">

    <section class="border-bottom border-dark color-family-1 text-center text-white">
        مهر پیش فرض
    </section>

    <section  class="row mx-5 mx-lg-2 my-3">

        <section class="col-12 col-lg-6">

            @if(!empty(Auth::user()->mohr))
                <img src="{{route("customer-panel.logo.show-image-mohr")}}" alt="تصویر مهر" style="max-width: 100%">
                <form method="post" action="{{route("customer-panel.logo.delete-image-mohr")}}" class="mt-1 d-block">
                    @csrf
                    <button onclick="goToConfirmDeleteForm(this)" type="button"  class="btn btn-danger  btn-sm font-size-12">
                        <i class="fa fa-trash-alt"></i>
                        حذف
                    </button>
                </form>
            @else
                <section class="border border-danger rounded">
                    <i class="fa fa-exclamation-circle text-danger font-size-xxlg d-block text-center my-1"></i>
                    <p class="text-danger text-center d-block my-1">
                        تصویری ذخیره نشده است
                    </p>
                </section>
            @endif

        </section>

        <form method="post" action="{{route("customer-panel.logo.upload-image-mohr")}}" enctype="multipart/form-data" class="col-12 col-lg-6 mt-5 mt-lg-0">
            @csrf
            <label class="form-label mb-1" for="user-mohr">انتخاب فایل مهر</label>
            <input name="mohr" type="file" class="form-control line-height-30 p-0" id="user-mohr" />
            <button class="btn btn-warning m-1 py-1 px-2 border border-dark shadow">
                ذخیره
            </button>
        </form>


    </section>

</section>