<a @if( $url!= "") href="{{$url}}" @endif class="d-flex justify-content-between list-group-item list-group-item-action header-profile-link">

    @if($title != "")
        <span class="form-icon-item-drop-down">
            <i class="{{$icon}}" aria-hidden="true"></i>
        </span>

        <span class="form-title-item-drop-down">
            {{$title}}
        </span>
    @else
        {{$slot}}
    @endif

</a>