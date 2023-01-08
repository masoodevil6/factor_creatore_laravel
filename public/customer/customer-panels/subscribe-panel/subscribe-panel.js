var formListUserSubscribe =$("#form-list-user-store");
var formInfoUserSubscribe=$("#form-show-user-subscribe");

function selectUserSubscribeInfo(userStoreId=null) {
    var data= {
        "user_subscribe_id" : userStoreId ,
        "_token": $('meta[name="csrf-token-customer-panel"]').attr('content')
    };
    var loading =  $("body").loadingAjax();
    $.ajax({
        url: $('meta[name="url-get-info-user-subscribe"]').attr('content'),
        type: "POST",
        data: data,
        beforeSend: function () {
            loading.start();
        },
        success: function (result) {
            goToFormShowUserSubscribe();
            $("#form-show-user-subscribe").html(result)
        },
        complete: function () {
            loading.end();
        }
    });
}

function goBackFromShowUserSubscribe() {
    formListUserSubscribe.removeClass("d-none");
    formInfoUserSubscribe.addClass("d-none");
}

function goToFormShowUserSubscribe() {
    formListUserSubscribe.addClass("d-none");
    formInfoUserSubscribe.removeClass("d-none");
}