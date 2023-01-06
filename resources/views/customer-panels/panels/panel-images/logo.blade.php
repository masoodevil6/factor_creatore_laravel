<section class="border border-dark shadow bg-white mt-2 mt-lg-0 ">

    <section class="border-bottom border-dark color-family-1 text-center text-white">
        لوگو پیش فرض
    </section>

    <section  class="row mx-5 mx-lg-2 my-3">

        <section class="col-12 col-lg-6">

            @if(!empty(Auth::user()->logo))
                <img src="{{route("customer-panel.logo.show-image-logo")}}" height="100" alt="تصویر لوگو">
                <form method="post" action="{{route("customer-panel.logo.delete-image-logo")}}" class="mt-1 d-block">
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

        <form method="post" action="{{route("customer-panel.logo.upload-image-logo")}}" enctype="multipart/form-data" class="col-12 col-lg-6 mt-5 mt-lg-0">
            @csrf
            <label class="form-label mb-1" for="user-logo">انتخاب فایل لوگو</label>
            <input name="logo" type="file" class="form-control line-height-30 p-0" id="user-logo" />
            <x-input-errors field="logo"/>
            <button class="btn btn-warning m-1 py-1 px-2 border border-dark shadow">
                ذخیره
            </button>
        </form>


    </section>

</section>