<nav aria-label="breadcrumb" class="border border-dark rounded mb-2 shadow">
    <ol class="breadcrumb  mb-0 p-1">
        <li class="breadcrumb-item  font-size-md"><a href="{{route("customer.home")}}" class="text-decoration-none px-2 rounded"> خانه </a></li>

        @foreach($nav as  $itemNav)
            <li class="breadcrumb-item font-size-md" >
                @php
                    $paramsRoute = [];
                    if (isset($itemNav["valueRoute"])){
                       $paramsRoute = $itemNav["valueRoute"];
                    }
                @endphp

                <a href="{{route($itemNav["route"] , $paramsRoute)}}" class="text-decoration-none px-2 py-1 rounded">
                    {{$itemNav["title"]}}
                </a>
            </li>
        @endforeach

    </ol>
</nav>