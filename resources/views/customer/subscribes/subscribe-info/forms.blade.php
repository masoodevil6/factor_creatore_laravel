<p class="border-bottom  my-2 mt-4 font-size-xlg">
    فرم های موجود:
</p>

<section class="row p-0 mx-2 my-1">
    @foreach($subscribe->forms As $itemForm)

        <section class="col-6 col-md-3 col-lg-2">

            <div class="d-block text-decoration-none text-dark border border-dark rounded shadow m-1 bg-white cursor-pointer">
                <section class="color-family-1 text-white text-center">
                    {{$itemForm->name}}
                </section>

                <section class=" p-1 h-100 ">
                    @if(!empty($itemForm->image))
                        <a href="{{asset($itemForm->image)}}">
                            <img class="m-auto d-block " height="95" src="{{asset($itemForm->image)}}" title="{{$itemForm->image_title}}" alt="{{$itemForm->image_alt}}">
                        </a>
                    @else
                        <i class="fa fa-spinner text-dark  text-center font-size-xxlg d-block py-4 line-height-40 " style="height: 100px"></i>
                    @endif

                        <a href="{{route("customer.create-factor.index" , ["form" => $itemForm["id"]])}}" class="p-1 mt-2 m-0 text-center btn btn-info d-block m-1 font-size-md shadow border border-dark text-hover-white">
                            فاکتور جدید
                            <i class="fa fa-arrow-left mr-2"></i>
                        </a>

                </section>

            </div>

        </section>

    @endforeach
</section>

<x-row-tables.admin.component-pageinate-panels
        :list="$subscribe->info_forms"/>


