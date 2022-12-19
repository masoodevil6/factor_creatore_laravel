<section class="w-100 border rounded mt-4 mx-2">

    <h5 class="mr-2 mt-2">
        {{$titleFa}}
    </h5>

    <section class="formListProperties{{$titleEn}}">

        {{$slot}}

    </section>

    <button type="button" onclick="addItemProperties{{$titleEn}}(this)" class="btn btn-success btn-sm my-1 mx-2 font-size-12">
        افزودن
    </button>

</section>

<script>

    function addItemProperties{{$titleEn}}(element) {

        var formListProperties = $(element).parent().find(".formListProperties{{$titleEn}}");


        var elementKey = formListProperties.children().length;

        var itemProperty =
            '<section class="row col-12 form-group item-property-{{$titleEn}}">' +
            @if($titleTag != "")
            '<div class="col-5 ">\n' +
            '<input name="{{$titleEn}}['+elementKey+'][{{$titleTag}}]" type="text" placeholder="عنوان" class="form-control form-control-sm form-text font-size-12">' +
            '</div>' +
            @endif
            '<div class="col-5 ">\n' +
            '<input name="{{$titleEn}}['+elementKey+'][{{$valueTag}}]" type="text" placeholder="مقدار" class="form-control form-control-sm form-text font-size-12">' +
            '</div>' +
            '<button onclick="deleteItemProperty{{$titleEn}}(this)" type="button"  class="btn btn-danger  btn-sm font-size-12">' +
            '<i class="fa fa-trash-alt"></i>  ' +
            'حذف ' +
            '</button>\n' +
            '</section>';


        formListProperties.append(itemProperty);
    }

    function deleteItemProperty{{$titleEn}}(element) {
        var formListProperties = $(element).parent();
        formListProperties.remove();
    }

</script>