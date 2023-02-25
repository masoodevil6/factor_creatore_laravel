@if(sizeof($formsSelected) > 0)
    <p class="border-bottom font-weight-bold my-2 mt-4">
        فرم های منتخب
    </p>
    <section class="row border border-dark my-1 w-100 m-0 shadow ">
        <section class="col-1 d-none d-lg-flex color-family-1 position-relative">
            <i onclick="goToRightScrollSelectedForms()" class="btn-angle-slider-selected  fa fa-angle-right position-absolute position-center font-size-xxlg border border-dark rounded bg-white  font-size-xlg p-2 shadow cursor-pointer"></i>
        </section>

        <section id="form-scroll-selected-forms" class="col-12 col-lg-10 bg-white d-flex p-0">
            <section id="scroll-selected-forms" class="d-flex">
                @foreach($formsSelected As $itemFormSelected)
                    <div class="item-selected-form my-2 cursor-pointer text-decoration-none">

                        <section class=" color-family-1 font-size-md">
                            <p class="text-white p-1 m-0 text-center">
                                {{$itemFormSelected -> name}}
                            </p>
                        </section>

                        <section class=" border border-dark ">
                            <?php
                            $srcImage = asset($itemFormSelected["image"]["indexArray"][$itemFormSelected["image"]["currentImage"]]);
                            ?>

                            <a href="{{$srcImage}}"  class="section-img-form position-relative d-block" >
                                <img class="position-absolute position-center" height="150" src="{{$srcImage}}" alt="">
                            </a>
                            <p class="p-1 m-0 text-center font-size-md text-dark">
                                [
                                {{$itemFormSelected -> form_category_id != null ? $itemFormSelected -> title : "-"}}
                                ]
                            </p>

                            <a href="{{route("customer.create-factor.index" , ["form" => $itemFormSelected["id"]])}}" class="p-1 m-0 text-center btn btn-info d-block m-1 font-size-md shadow border border-dark text-hover-white">
                                فاکتور جدید
                                <i class="fa fa-arrow-left mr-2"></i>
                            </a>
                        </section>
                    </div>
                @endforeach
            </section>
        </section>

        <section class="col-1 d-none  d-lg-flex color-family-1 position-relative">
            <i onclick="goToLeftScrollSelectedForms()" class="btn-angle-slider-selected  fa fa-angle-left position-absolute position-center font-size-xxlg border border-dark rounded bg-white  font-size-xlg p-2 shadow cursor-pointer"></i>
        </section>
    </section>
@endif

