var formListUserFactor =$("#form-list-user-factor");
var formShowUserFactor =$("#form-show-user-factor");
function selectUserFactorInfo(userFactorResNum) {
    var data= {
        "user_factor_res_num" : userFactorResNum ,
        "_token": $('meta[name="csrf-token-customer-panel"]').attr('content')
    };
    var loading =  $("body").loadingAjax();
    $.ajax({
        url: $('meta[name="url-get-info-user-factor"]').attr('content'),
        type: "POST",
        data: data,
        beforeSend: function () {
            loading.start();
        },
        success: function (result) {
            goToFormShowFactorClient();
            $("#form-show-user-factor").html(result)
        },
        complete: function () {
            loading.end();
        }
    });
}
function goBackFromShowFactorClient() {
    formListUserFactor.removeClass("d-none");
    formShowUserFactor.addClass("d-none");
}

function goToFormShowFactorClient() {
    formListUserFactor.addClass("d-none");
    formShowUserFactor.removeClass("d-none");
}