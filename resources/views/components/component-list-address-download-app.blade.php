@foreach($linkApps as $itemCategoryApp)

    <p class=" font-weight-bold my-2 text-{{$color}} border-bottom border-{{$color}}">
        {{$itemCategoryApp["name"]}}
    </p>

    <section class="d-flow-root">

        @foreach($itemCategoryApp["apps"] as $itemApp)

            @if(!empty($itemApp["image"]) && $itemApp["image"] != null)

                <a href="{{asset($itemApp["address"])}}" class=" my-1  ml-2 float-right   rounded">

                    <image src="{{asset($itemApp["image"])}}" height="40" class="float-right "/>

                </a>

            @else

                <a href="{{asset($itemApp["address"])}}" class="btn btn-info  my-1 ml-2 float-right border border-dark shadow rounded p-1 text-decoration-none">

                    <i class="fa fa-download float-right line-height-30 text-white mr-2"></i>

                    <span class="text-white p-1 m-0 text-center float-right mx-2">
                        {{$itemApp["name"]}}
                    </span>

                </a>

            @endif

        @endforeach

    </section>


@endforeach