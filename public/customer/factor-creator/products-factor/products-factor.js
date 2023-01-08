


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


function changeUnitProduct(element) {
    $("input[name=unit]").val($.trim($(element).val()))
}


function changeInputnum() {
    setTextTotalProduct();
}
function changeInputprice() {
    setTextTotalProduct();
}
function changeInputoff() {
    setTextTotalProduct();
}


function setTextTotalProduct() {

    var textProductPrice = $("#text-product-price");
    var textProductOff = $("#text-product-off");
    var textProductTotalOne = $("#text-product-total-one");
    var textProductTotal = $("#text-product-total");

    var inputTextNum = $("input[name=num]");
    var inputTextOff = $("input[name=off]");
    var inputTextPrice = $("input[name=price]");

    var productNum =$.trim(inputTextNum.val());
    var productOff =$.trim(inputTextOff.val());
    var productPrice =$.trim(inputTextPrice.val());

    var totalOne = (productPrice - productOff);
    var total = (productPrice - productOff)*productNum;


    textProductPrice.text(numberFormat(productPrice) + " "+passPrice);
    textProductOff.text(numberFormat(productOff) + " "+passPrice);
    textProductTotalOne.text(numberFormat(totalOne) + " "+passPrice);
    textProductTotal.text(numberFormat(total) + " "+passPrice);

}
