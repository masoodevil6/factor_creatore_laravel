
function addOrEditProductInFactor(productId=null) {
    var data= {
        "template_factor_product_id" : productId ,
        "_token": $('meta[name="csrf-token"]').attr('content')
    };
    var loading =  $("body").loadingAjax();
    $.ajax({
        url: $('meta[name="url-get-info-factor-product"]').attr('content'),
        type: "POST",
        data: data,
        beforeSend: function () {
            loading.start();
        },
        success: function (result) {
            $("#section-info-factor-product").html(result)
        },
        complete: function () {
            loading.end();
        }
    });
}
