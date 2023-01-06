<nav aria-label="breadcrumb" class="border border-dark rounded mb-2 shadow  color-family-1">
    <i class="float-right line-height-30 px-2 text-white  fa fa-at "></i>

    <ol class="breadcrumb  mb-0 p-1  color-family-1 ">
        <li class="breadcrumb-item mx-1 font-size-md"><a href="{{route("customer.home")}}" class="text-decoration-none px-2  rounded border border-white"> خانه </a></li>

        @foreach($nav as  $itemNav)
            <li class="breadcrumb-item font-size-md mx-1" >
                @php
                    $paramsRoute = [];
                    if (isset($itemNav["valueRoute"])){
                       $paramsRoute = $itemNav["valueRoute"];
                    }
                @endphp

                <a href="{{route($itemNav["route"] , $paramsRoute)}}" class="text-decoration-none px-2 py-0 rounded border border-white">
                    {{$itemNav["title"]}}
                </a>
            </li>
        @endforeach

    </ol>
</nav>