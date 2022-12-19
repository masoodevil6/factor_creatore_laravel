
<link  rel="stylesheet" href="{{asset("admin/public/select2/css/select2.min.css")}}"/>

<section class="col-6 mt-2">

    <label for="input-{{$titleEn}}" class="d-block text-right font-size-12">
        {{$titleFa}}
    </label>

    <input id="value-select-{{$titleEn}}" name="{{$titleEn}}" type="hidden"  value="@if(old($titleEn)){{old($titleEn)}}@else{{$value}}@endif" class="select2 form-control form-control-sm form-text font-size-12">

    <select id="input-{{$titleEn}}" multiple class="select2 form-control form-control-sm form-text font-size-12">
    </select>

    <x-input-errors field="{{$titleEn}}"/>
</section>

<script src="{{asset("admin-assets/select2/js/select2.min.js")}}"></script>
<script>

    $(document).ready(function(){

        var tags_input = $("#value-select-{{$titleEn}}");
        var formDataTags = $("#form-data-group") != null ? $("#form-data-group") :  $(tags_input.parents("form"));
        var tags_select = $("#input-{{$titleEn}}");

        var tags_defaults = tags_input.val();
        var array_tags_defaults = [];
        if (tags_defaults != null && tags_defaults.length>0){
            array_tags_defaults = tags_defaults.split(",");
        }

        tags_select.select2({
            placeholder: "لطفا تگ ها را وارد نمایید ... " ,
            tags: true ,
            data: array_tags_defaults
        });
        tags_select.children("option").attr("selected" , true).trigger("change");

        formDataTags.submit(function (event) {
            if (tags_select.val() != null && tags_select.val().length > 0){
                var selected_source = tags_select.val().join(",");
                tags_input.val(selected_source);
            }
        });

        $(".selection").addClass(" form-text font-size-12 mt-0");
    });

</script>