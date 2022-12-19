<label class="label-{{$titleEn}}">

    <meta name="csrf-token-{{$titleEn}}" content="{{ csrf_token() }}" />

    <input class="input-{{$titleEn}}" name="{{$titleEn}}" type="checkbox" onchange="change{{$titleEn}}Val(this , '{{$url}}')" @if($value == 1) checked @endif>
    <span>
        @if($value == 1)
            فعال
        @else
            غیر فعال
        @endif
    </span>

</label>

<script>

    function change{{$titleEn}}Val(element ,  url) {

        var titleFa = "{{$titleFa}}";
        var label = $(element).parent().find("span");
        var elementValue = !$(element).prop("checked");
        var _token  = $('meta[name="csrf-token-{{$titleEn}}"]').attr('content');

        $.ajax({
            url: url,
            type: "POST",
            data : {
                '_token': _token
            },
            success: function (res) {
                console.log(res)
                if (res["status"]){
                    if (res["checked"]){
                        $(element).prop("checked" , true);
                        successToast(titleFa + " با موفقیت فعال شد");
                    }
                    else {
                        $(element).prop("checked" , false);
                        successToast( titleFa + " با موفقیت غیر فعال شد");
                    }
                }
                else {
                    $(element).prop("checked" , elementValue);
                    errorToast("هنگام ویرایش مشکلی به وجود آمده است");
                }

                if ($(element).prop("checked")){
                    label.text("فعال")
                }
                else {
                    label.text("غیر فعال")
                }

            },
            error: function () {
                $(element).prop("checked" , elementValue);
                errorToast("ارتباط برقرار نشد");
            }
        })
    }

</script>