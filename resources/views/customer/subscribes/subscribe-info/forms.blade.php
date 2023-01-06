<p class="border-bottom  my-2 mt-4 font-size-xlg">
    فرم های موجود:
</p>

<section class="row p-0 mx-2 my-1">
    @foreach($subscribe->info["forms"] As $itemForm)

        <section class="col-6 col-md-4 col-lg-3">

            <a @if(!empty($itemForm["image"])) href="{{asset($itemForm["image"])}}" @endif  class="d-block text-decoration-none text-dark border border-dark rounded shadow m-2 bg-white cursor-pointer">
                <section class="color-family-1 text-white text-center">
                    {{$itemForm["name"]}}
                </section>

                <section class=" p-2 h-100 ">
                    @if(!empty($itemForm["image"]))
                        <img class="m-auto d-block " height="100" src="{{asset($itemForm["image"])}}" alt="">
                    @else
                        <i class="fa fa-spinner text-dark  text-center font-size-xxlg d-block py-4 line-height-40 " style="height: 100px"></i>
                    @endif

                </section>

            </a>

        </section>

    @endforeach
</section>

<x-row-tables.admin.component-pageinate-panels
        :list="$subscribe"/>


