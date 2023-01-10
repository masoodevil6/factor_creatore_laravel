<section id="section-upload-image-mohr-user" class="col-12  mt-2 mx-0 @if($defaultTypeMohr==1) d-block @else d-none @endif">

    <section class="row  mx-0 border border-dark rounded py-2 ">

        <section class="col-12 col-lg-6">

            @if(!empty($factor->mohr_name))

                <img src="{{route("customer.images-factor.get-template-mohr-image")}}"  class="d-block m-auto" height="100" alt="تصویر مهر" style="max-width: 100%">
                <form method="post" action="{{route("customer.images-factor.delete-template-mohr-image")}}" class="mt-1 d-block">
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

        <form method="post" action="{{route("customer.images-factor.upload-template-mohr-image")}}" enctype="multipart/form-data" class="col-12 col-lg-6 mt-5 mt-lg-0">
            @csrf
            <label class="form-label mb-1" for="user-mohr">انتخاب فایل مهر</label>
            <input name="mohr_name" type="file" class="form-control line-height-30 p-0" id="user-mohr" />
            <x-input-errors field="mohr_name"/>
            <button class="btn btn-warning m-1 py-1 px-2 border border-dark shadow">
                ذخیره
            </button>
        </form>

    </section>


</section>
