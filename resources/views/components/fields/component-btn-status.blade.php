<section class="formClassBtnStatus" data-field="{{$titleEn}}">

    <meta name="csrf-token-{{$method}}" content="{{ csrf_token() }}" />

    <button data-value="{{$positiveValue}}" onclick="setDisable{{$method}}(this , '{{$url}}' , {{$reverse}})" type="button" class="btn_status_select @if($value == $positiveValue) d-block @else d-none @endif btn_disable btn btn-success btn-sm float-left font-size-12  mr-2 my-sm-1  my-md-1 my-lg-0 mx-1">
        <i class="fa fa-check"></i>
        <span>
            {{$title}}
            شده
        </span>
    </button>

    <button data-value="{{$negativeValue}}" onclick="setEnable{{$method}}(this , '{{$url}}' , {{$reverse}})" type="button" class="btn_status_select @if($value == $negativeValue) d-block @else d-none @endif btn_enable btn btn-danger btn-sm float-left font-size-12  mr-2 my-sm-1  my-md-1 my-lg-0 mx-1">
        <i class="fa fa-times"></i>
        <span>
            {{$title}}
            نشده
        </span>
    </button>

</section>

<script>
    function setEnable{{$method}}(element , url , reverse) {
        submitStatus{{$method}}(element , {{$positiveValue}} , url , reverse);
    }
    function setDisable{{$method}}(element , url , reverse) {
        submitStatus{{$method}}(element , {{$negativeValue}} , url , reverse);
    }
    function submitStatus{{$method}}(element , status , url , revers) {

        var titleFa = "{{$titleFa}}";
        var form = $(element).parent();

        var btnEnable = form.find(".btn_enable");
        var btnDisable = form.find(".btn_disable");

        var _token  = $('meta[name="csrf-token-{{$method}}"]').attr('content');

        $.ajax({
            url: url,
            type: "POST",
            data : {
                '_token': _token ,
                'status' : status
            },
            success: function (res) {
                clearLastSelectedBtnStatus{{$method}}(element);
                if (res["status"]){
                    if (res["checked"]){
                        btnDisable.removeClass("d-none").addClass('d-block');
                        btnEnable.removeClass("d-block").addClass('d-none');
                        form.addClass('status-selected');
                        searchUpdateShowDisableOtherStatus{{$method}}(element);
                        if (revers){
                            successToast(titleFa + " با موفقیت فعال شد");
                        }
                        else {
                            successToast( titleFa + " با موفقیت غیر فعال شد");
                        }

                    }
                    else {
                        btnEnable.removeClass("d-none").addClass('d-block');
                        btnDisable.removeClass("d-block").addClass('d-none');
                        form.addClass('status-selected');
                        searchUpdateShowDisableOtherStatus{{$method}}(element);
                        if (revers){
                            successToast( titleFa + " با موفقیت غیر فعال شد");
                        }
                        else {
                            successToast(titleFa + " با موفقیت فعال شد");
                        }
                    }
                }
                else {
                    errorToast("هنگام ویرایش مشکلی به وجود آمده است");
                }

            },
            error: function () {
                errorToast("ارتباط برقرار نشد");
            }
        })

    }

    function clearLastSelectedBtnStatus{{$method}}(element) {
        var parent = $(element).parent().parent();
        if (parent.hasClass("listFormClassBtnStatus")){
            var formListBtn = parent.find(".formClassBtnStatus");
            formListBtn.removeClass("status-selected");
            console.log(formListBtn)
            var btnEnable = formListBtn.find(".btn_enable");
            var btnDisable = formListBtn.find(".btn_disable");
            btnEnable.removeClass("d-block").addClass('d-none');
            btnDisable.removeClass("d-block").addClass('d-none');
        }
    }


    function searchUpdateShowDisableOtherStatus{{$method}}(element) {
        var parent = $(element).parent().parent();
        if (parent.hasClass("listFormClassBtnStatus")){
            var formListBtn = parent.find(".formClassBtnStatus");
            for (var i=0 ; i< formListBtn.length ; i++){
                var formSelected = formListBtn.eq(i);

                if (!formSelected.hasClass("status-selected")){
                    formSelected.find(".btn_status_select[data-value=0]").removeClass("d-none").addClass('d-block');
                }
            }
        }

    }

</script>