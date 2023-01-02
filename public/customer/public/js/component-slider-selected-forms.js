var itemSelectedForms = $(".item-selected-form");
var formScrollSelectedForms = $("#form-scroll-selected-forms");
var scrollSelectedForms = $("#scroll-selected-forms");

$(window).resize(function(){
    resizeCustomerPanel();
});
resizeCustomerPanel();
function resizeCustomerPanel(){

    if ($( window ).width() >= 992 && itemSelectedForms.length > 0){
        var margin= getDataItemInScreen()["margin"];

        scrollSelectedForms.css("margin-right" , 0);
        itemSelectedForms.css({
            "margin-left" : margin+"px",
            "margin-right" : margin+"px"
        });
    }
}

function goToRightScrollSelectedForms() {
    var maxMarginRight = getDataItemInScreen();
    var realMargin = parseInt(scrollSelectedForms.css("margin-right"));
    if (realMargin  < 0){
        scrollSelectedForms.animate({"margin-right" : realMargin+maxMarginRight["transform"]+"px"} , 100);
    }

}
function goToLeftScrollSelectedForms() {
    var maxMarginRight = getDataItemInScreen();
    var realMargin = parseInt(scrollSelectedForms.css("margin-right"));
    if (Math.abs(realMargin)  < maxMarginRight["maxMarginRight"]){
        scrollSelectedForms.animate({"margin-right" : realMargin-maxMarginRight["transform"]+"px"} , 100);
    }
}



function getDataItemInScreen() {
    var n = 0;
    if ($( window ).width() >= 992 && itemSelectedForms.length > 0){
        var maxWidth = formScrollSelectedForms.width() ;
        var itemSelectedForm = itemSelectedForms.eq(0);
        var itemSelectedFormWidth = itemSelectedForm.width();

        n = 1;
        while (itemSelectedFormWidth*n < (maxWidth- 100)){
            n++;
        }
        var margin = (maxWidth-((n-1)*itemSelectedFormWidth))/((n-1)*2);

        var transform = Math.floor(itemSelectedFormWidth + 2*margin);

        var maxMarginRight = 0;
        if (itemSelectedForms.length > (n - 1)){
            maxMarginRight = (itemSelectedForms.length - (n - 1)) * transform;
        }

    }
    return {
        "margin" : margin ,
        "transform" : transform ,
        "maxMarginRight" : maxMarginRight
    };
}
