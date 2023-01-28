<section class="{{$col}} mt-2">

    <p class="d-block text-white text-center py-1 font-size-12" style="background-color: grey">
        {{$title}}
    </p>

    @if(!empty($href))
        <a href="{{$href}}" class="d-block text-center font-size-12">
            {{$value}}
        </a>
    @else
        <p class="d-block text-center font-size-12">
            {{$value}}
        </p>
    @endif




</section>