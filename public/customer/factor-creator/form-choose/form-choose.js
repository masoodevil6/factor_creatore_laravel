var sectionSelectForm = $("#section-select-form");
var sectionInfoForm = $("#section-info-form");

function changeFormCategory(element) {
    var data= {
        "form_category_id" : $(element).val() ,
        "_token": $('meta[name="csrf-token"]').attr('content')
    };
    var loading =  $("body").loadingAjax();
    $.ajax({
        url: $('meta[name="url-get-forms-in-form-category"]').attr('content'),
        type: "POST",
        data: data,
        beforeSend: function () {
            loading.start();
        },
        success: function (result) {
            sectionSelectForm.html(result["forms"]);
            sectionInfoForm.html(result["form_selected"])
        },
        complete: function () {
            loading.end();
        },
        dataType: "json"
    });
}


function selectForm(element) {
    var formId = $.trim($(element).attr("data-id"));
    var data= {
        "form_id" : formId ,
        "_token": $('meta[name="csrf-token"]').attr('content')
    };
    var loading =  $("body").loadingAjax();
    $.ajax({
        url: $('meta[name="url-get-info-form"]').attr('content'),
        type: "POST",
        data: data,
        beforeSend: function () {
            loading.start();
        },
        success: function (result) {
            selectColorItemForm(formId);
            sectionInfoForm.html(result)
        },
        complete: function () {
            loading.end();
        }
    });
}


function selectColorItemForm(formId) {
    var itemForms = $(".item-form");

    itemForms.removeClass("bg-info").addClass("bg-warning");
    itemForms.find("i").removeClass("fa-check-square").addClass("fa-square");

    for (var i=0; i<itemForms.length ; i++){
        var item = itemForms.eq(i);
        if ($.trim(item.attr("data-id")) == formId){
            item.removeClass("bg-warning").addClass("bg-info");
            item.find("i").removeClass("fa-square").addClass("fa-check-square");
            break;
        }
    }

}