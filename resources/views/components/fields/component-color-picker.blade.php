<link rel="stylesheet" href="{{asset("admin/public/colorpicker/css/colorpicker.css")}}">

<section class="col-6 mt-2">

    <label for="label-for-{{$titleEn}}" class="d-block text-right font-size-12">
        {{$titleFa}}
    </label>

    <div id="label-for-{{$titleEn}}"  class="form-control form-control-sm form-text font-size-12" onmouseup="showColorPicker{{$titleEn}}(this)"></div>

    <input id="val-colorpicker-{{$titleEn}}" type="hidden"  name="{{$titleEn}}"  value="@if(old($titleEn)){{old($titleEn)}}@else{{$value}}@endif">

    <x-input-errors field="{{$titleEn}}"/>

</section>

<script src="{{asset("admin/public/colorpicker/js/colorpicker.js")}}"></script>

<script>

    var defaultColor = $("#val-colorpicker-{{$titleEn}}").val();
    $("#label-for-{{$titleEn}}").css('background-color', defaultColor);

    function showColorPicker{{$titleEn}}(element) {

        var valColorPicker = $(element).parent().find("#val-colorpicker-{{$titleEn}}");

        $(element).ColorPicker({
            color: valColorPicker.val(),

            onShow: function (colpkr) {
                $(colpkr).fadeIn(500);
                return false;
            },
            onHide: function (colpkr) {
                $(colpkr).fadeOut(500);
                return false;
            },
            onChange: function (hsb, hex, rgb) {
                var color = '#' + hex;
                valColorPicker.val(color);
                $(element).css('background-color', color);
            }
        });
    }



</script>