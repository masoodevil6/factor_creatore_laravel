<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item font-size-12"><a href="{{route("admin.home")}}"> خانه </a></li>
        <li class="breadcrumb-item font-size-12" ><a href="{{route("admin.home")}}"> {{$nav["part"]}}</a></li>

        @foreach($nav["navigation"] as  $itemNav)
            @if($itemNav["current"] == 0)
                <li class="breadcrumb-item font-size-12" >

                    @php
                    $paramsRoute = [];
                    if (isset($itemNav["valueRoute"])){
                       $paramsRoute = $itemNav["valueRoute"];
                    }
                    @endphp

                    <a class="px-2" href="@if($itemNav["route"] == "") # @else {{route($itemNav["route"] , $paramsRoute)}} @endif">
                        {{$itemNav["title"]}}
                    </a>
                </li>
            @elseif($itemNav["current"] == 1)
                <li class="breadcrumb-item active font-size-12 my-2" aria-current="page">
                    {{$itemNav["title"]}}
                </li>
            @endif
        @endforeach


    </ol>
</nav>