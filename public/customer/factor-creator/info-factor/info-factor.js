function changeUserStroeSelected(element) {
    var data= {
        "user_store_id" : $.trim($(element).val()) ,
        "_token": $('meta[name="csrf-token"]').attr('content')
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
            $("#info-store-user").html(result)
        },
        complete: function () {
            loading.end();
        }
    });
}