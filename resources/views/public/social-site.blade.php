<section id="form-footer-social" class="d-block w-100 mr-3">
    @if(sizeof($socials) > 0)
        <section class="col-lg-2 mt-lg-1 row justify-content-center mt-2">

            <section id="form-items-social" class=" row  color-family-1">
                @foreach($socials As $key => $itemSocials)
                    <a href="{{$itemSocials["url"]}}" title="{{$itemSocials["title"]}}" class="item-nav-social text-decoration-none mx-2 p-0 text-center">
                        <i class="{{$itemSocials["icon"]}} text-white "></i>
                    </a>
                @endforeach
            </section>

        </section>
    @endif
</section>
