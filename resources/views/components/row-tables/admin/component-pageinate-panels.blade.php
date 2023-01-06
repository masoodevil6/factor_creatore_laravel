<section class="border-top border-dark mx-2 py-1">
    <nav  class="">
        <ul class="pagination pagination-sm justify-content-center">
            @foreach($array As $page)
                <li class="page-item @if($page["selected"] == 1) disabled @endif">
                    <a class="page-link" href="{{$page["link"]}}" tabindex="-1">{{$page["page"]}}</a>
                </li>
            @endforeach
        </ul>
    </nav>
</section>