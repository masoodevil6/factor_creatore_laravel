<aside id="sidebar" class="sidebar">
    <section class="sidebar-container">

        <section class="sidebar-wrapper">


            <section class="border px-2 pt-1 mx-2 row bg-danger rounded">
                <section class="col-4 text-white">
                    پنل:
                </section>
                <section class="col-8 text-white">
                    {{$panelName}}
                </section>
            </section>


            <a href="{{route("admin.home")}}" class="sidebar-link">
                <i class="fas fa-home"></i>
                <span>خانه</span>
            </a>


            @if(isset($panels))
                @foreach($panels As $itemGroupPanel)

                    <section class="sidebar-part-title">
                        {{$itemGroupPanel["panel_group"]["title"]}}
                    </section>

                    @foreach($itemGroupPanel["panels"] As $itemPanel)

                        <a href="{{route($itemPanel["link"])}}" class="sidebar-link">
                            <i class="{{$itemPanel["icon"]}}"></i>
                            <span>{{$itemPanel["name"]}}</span>
                        </a>

                    @endforeach

                @endforeach
            @endif

        </section>

    </section>
</aside>