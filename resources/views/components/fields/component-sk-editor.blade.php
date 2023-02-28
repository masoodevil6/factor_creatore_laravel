
<section class="{{$dissplay}}   mt-2">

    <label for="label-for-{{$titleEn}}" class="d-block text-right font-size-12">
        {{$titleFa}}
    </label>

    <textarea name="{{$titleEn}}" id="label-for-{{$titleEn}}"class="form-control form-control-sm" rows="{{$row}}">@if(old("$titleEn")) {{old("$titleEn")}}  @else {{$value}} @endif</textarea>

    <x-input-errors field="{{$titleEn}}"/>

</section>

@if($ckEditor == 1)
    <script src="{{asset("admin-assets/ckeditor/ckeditor.js")}}"></script>
    <script src="{{asset("admin-assets/ckeditor/config.js")}}"></script>
    <script>
        CKEDITOR.replace(
            "{{$titleEn}}",
            {
                on: {
                    key: function() {
                        checkSeoDescriptionProduct();
                    }
                },

                customConfig: 'public/ckeditor/config.js'

            }
        );
    </script>
@endif
