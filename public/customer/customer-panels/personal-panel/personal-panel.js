
var token = "";
var formAllPanelPersonalCustomer  = $("#form-all-panel-personal-customer");
var formCheckCodePanelPersonalCustomer  = $("#form-check-code-panel-personal-customer");
function goBackPersonalPanelClient() {
    result = "";
    formAllPanelPersonalCustomer.removeClass("d-none");
    formCheckCodePanelPersonalCustomer.addClass("d-none");
}

function submitEmailOrPhoneForVerify(element) {

    var type = $(element).attr("data-type");
    var input = input = $.trim($("input[name="+type+"]").val());

    var data= {
        "type" : type ,
        "input" : input ,
        "_token": $('meta[name="csrf-token-customer-panel"]').attr('content')
    };
    var loading =  $("body").loadingAjax();
    $.ajax({
        url: $('meta[name="url-send-email-or-phone-client"]').attr('content'),
        type: "POST",
        data: data,
        beforeSend: function () {
            loading.start();
        },
        success: function (result) {
            if (result != ""){
                token = result;
                formCheckCodePanelPersonalCustomer.removeClass("d-none");
                formAllPanelPersonalCustomer.addClass("d-none");
            }
            else{
                messageActionError();
            }
        },
        complete: function () {
            loading.end();
        }
    });

}



function checkVerifyCodeMobileOrEmail() {
    var code = $.trim($("input[name=code]").val());

    var data= {
        "token" : token ,
        "code" : code ,
        "_token": $('meta[name="csrf-token-customer-panel"]').attr('content')
    };
    var loading =  $("body").loadingAjax();
    $.ajax({
        url: $('meta[name="url-verify-email-or-phone-client"]').attr('content'),
        type: "POST",
        data: data,
        success: function (result) {
            loading.start();
            if (result == 1){
                goBackPersonalPanelClient();
                goToThisFirstFormPanel();
            }
            else{
                messageActionError();
            }
        },
        complete: function () {
            loading.end();
        }
    });
}