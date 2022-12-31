var formListUserStores =$("#form-list-user-store");
var formInfoAddOrEditUserStore =$("#form-add-or-edit-user-store");

function selectUserStoreInfo(userStoreId=null) {
    var data= {
        "user_store_id" : userStoreId ,
        "_token": $('meta[name="csrf-token-customer-panel"]').attr('content')
    };

    $.ajax({
        url: $('meta[name="url-get-info-user-store"]').attr('content'),
        type: "POST",
        data: data,
        success: function (result) {
            goToFormSubmitNewStoreClient();
            $("#form-add-or-edit-user-store").html(result)
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