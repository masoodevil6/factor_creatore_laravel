var formListUserStores =$("#form-list-user-store");
var formInfoAddOrEditUserStore =$("#form-add-or-edit-user-store");

function selectUserStoreInfo(userStoreId=null) {
    var data= {
        "user_store_id" : userStoreId ,
        "_token": $('meta[name="csrf-token-customer-panel"]').attr('content')
    };
    var loading =  $("body").loadingAjax();
    $.ajax({
        url: $('meta[name="url-get-info-user-store"]').attr('content'),
        type: "POST",
        data: data,
        beforeSend: function () {
            loading.start();
        },
        success: function (result) {
            goToFormSubmitNewStoreClient();
            $("#form-add-or-edit-user-store").html(result)
        },
        complete: function () {
            loading.end();
        }
    });
}

function goBackFromSubmitUserStorePanel() {
    formListUserStores.removeClass("d-none");
    formInfoAddOrEditUserStore.addClass("d-none");
}

function goToFormSubmitNewStoreClient() {
    formListUserStores.addClass("d-none");
    formInfoAddOrEditUserStore.removeClass("d-none");
}