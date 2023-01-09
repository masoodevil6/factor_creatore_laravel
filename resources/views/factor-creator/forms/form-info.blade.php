@if(!isset($form))

    <section class="m-2 border-danger border rounded p-2 row">
        <section class="col-4">
            <i class="fa fa-exclamation-circle font-size-xxlg text-center  text-danger d-block" aria-hidden="true"></i>
        </section>
        <p class="col-8 text-right text-danger m-0 font-weight-bold">
            ابتدا فرم نهایی فاکتور مورد نظر خود را انتخاب نمایید
        </p>

    </section>

@else

    <form action="{{route("customer.forms-factor.end-process-select-form")}}" method="post" class="border border-dark bg-white rounded mt-2 mt-lg-0">
        @csrf

        <p class="bg-dark text-white text-center font-size-lg">
            وضعیت:
            <span class="mr-2 font-weight-bold">
                 @if($form->active)
                    فعال
                @else
                    غیر فعال
                @endif
            </span>
        </p>

        <input type="hidden" name="form" value="{{$form->id}}">

        <section class="p-2  mx-3 my-2">

            @if(!empty($form["image"]))
                <img class="m-auto d-block " height="150" src="{{asset($form["image"]["indexArray"][$form["image"]["currentImage"]])}}" alt="">
            @else
                <i class="fa fa-spinner text-dark  text-center font-size-xxlg d-block py-5 line-height-40" style="height: 150px"></i>
            @endif

        </section>

        <button type="submit" class="btn @if($form->active) btn-info text-white @else btn-warning text-dark @endif   p-1 m-0 m-2 shadow text-center font-size-md  border border-dark text-hover-white  px-2 font-weight-bold font-size-md ">
            @if($form->active)
                انتخاب و ادامه
            @else
                خرید و فعال سازی
            @endif
            <i class="fa fa-check mr-1 border  @if($form->active)  border-white @else  border-dark @endif  rounded p-1"></i>
        </button>

    </form>

@endif