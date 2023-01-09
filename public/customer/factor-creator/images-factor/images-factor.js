var inputTypeLogoName = $("input[name=type_logo_name]");
var sectionDefaultImageLogoUser = $("#section-default-image-logo-user");
var sectionUploadImageLogoUser = $("#section-upload-image-logo-user");


var inputTypeMohrName = $("input[name=type_mohr_name]");
var sectionDefaultImageMohrUser = $("#section-default-image-mohr-user");
var sectionUploadImageMohrUser = $("#section-upload-image-mohr-user");


function changeTypeLogoName(element) {
    var type = $.trim($(element).val());
    sectionDefaultImageLogoUser.removeClass("d-block").addClass("d-none");
    sectionUploadImageLogoUser.removeClass("d-block").addClass("d-none");
    if (type == 0){
        sectionDefaultImageLogoUser.removeClass("d-none").addClass("d-block");
    }
    else if (type == 1){
        sectionUploadImageLogoUser.removeClass("d-none").addClass("d-block");
    }
    inputTypeLogoName.val(type);
}


function changeTypeMohtName(element) {
    var type = $.trim($(element).val());
    sectionDefaultImageMohrUser.removeClass("d-block").addClass("d-none");
    sectionUploadImageMohrUser.removeClass("d-block").addClass("d-none");
    if (type == 0){
        sectionDefaultImageMohrUser.removeClass("d-none").addClass("d-block");
    }
    else if (type == 1){
        sectionUploadImageMohrUser.removeClass("d-none").addClass("d-block");
    }
    inputTypeMohrName.val(type);
}


function setInfoAndSubmitForm() {
    inputTypeLogoName.val($.trim($("#select-option-type-logo").val()));
    inputTypeMohrName.val($.trim($("#select-option-type-mohr").val()));
    $("form[id=form-go-to-next-step-process]").submit();
}