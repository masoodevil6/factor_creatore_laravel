var formListUserFactor =$("#form-list-user-factor");
var formShowUserFactor =$("#form-show-user-factor");

function selectUserFactorInfo(userFactorResNum) {
    var data= {
        "user_factor_res_num" : userFactorResNum ,
        "_token": $('meta[name="csrf-token-customer-panel"]').attr('content')
    };
    $.ajax({
        url: $('meta[name="url-get-info-user-factor"]').attr('content'),
        type: "POST",
        data: data,
        success: function (result) {
            goToFormShowFactorClient();
            $("#form-show-user-factor").html(result)
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