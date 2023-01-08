var intoPanel = false;
function setTrueIntoPanel() {
    intoPanel = true;
    resizeCustomerPanel();
}
function setFalseIntoPanel() {
    intoPanel = false;
    resizeCustomerPanel();
}

function goToThisFirstFormPanel() {
    var panel = $.trim($("#inside-panel-view").attr("data-panel"));
    selectPanelCustomerWithTitle(panel);
}
function selectPanelCustomerWithTitle(title) {
    var itemPanels = $(".item-customer-panel");
    for (var i=0 ; i< itemPanels.length ; i++){
        var itemPanel = itemPanels.eq(i);
        var titlePanel = $.trim(itemPanel.attr("data-title"));
        if (titlePanel == title){
            itemPanel.trigger( "click" );
            break;
        }
    }
}

function selectItemPanelCustomer(element) {
    var panelName = $(element).attr("data-title");

    getViewItemCustomerPanel(panelName);
}

function goBackMainPanel() {
    setFalseIntoPanel();
}

function getViewItemCustomerPanel(panelName , setHistoryUrl=true) {
    var data= {
        "panel_name" : panelName ,
        "_token": $('meta[name="csrf-token-customer-panel"]').attr('content')
    };
    var loading =  $("body").loadingAjax();
    $.ajax({
        url: $('meta[name="url-get-view-panel"]').attr('content'),
        type: "POST",
        data: data,
        beforeSend: function () {
            loading.start();
        },
        success: function (result) {
            setTrueIntoPanel();
            $("#panel_view").html(result["view"]);
            selectedItemCustomerPanel(result["titleEn"]);
            if (setHistoryUrl){
                setUrlHistoryPanel(result["titleEn"]);
            }
        },
        complete: function () {
            loading.end();
        },
        dataType: "json"
    });
}

function setUrlHistoryPanel(panelName) {
    var urlPage = $('meta[name="url-this-panel"]').attr('content');
    var newUrl = urlPage+"/"+panelName;
    var data = {
        "panel-name": panelName
    };
    window.history.pushState(data, null, newUrl);
}

window.addEventListener('popstate', function(e) {
    var character = e.state;
    var panelName;
    if (character == null) {
        panelName = "";
    }
    else {
        panelName = character["panel-name"];
    }
    getViewItemCustomerPanel(panelName , false);
});

function selectedItemCustomerPanel(panelName) {
    var listItemsCustomerPnael = $(".item-customer-panel");
    listItemsCustomerPnael.removeClass("selected-item-customer");
    for (var i=0; i<listItemsCustomerPnael.length ; i++){
        var itemSelected = listItemsCustomerPnael.eq(i);
        if (panelName == itemSelected.attr("data-title")){
            itemSelected.addClass("selected-item-customer");
            break;
        }
    }
}

$(window).resize(function(){
    resizeCustomerPanel();
});
resizeCustomerPanel();
function resizeCustomerPanel(){
    var listPnaels = $("#list_panel_customer");
    var panelView = $("#panel_view");
    var screenWidth = $( window ).width();
    if (screenWidth < 992){
        if (intoPanel){
            listPnaels.removeClass("d-block").addClass("d-none");
            panelView.removeClass("d-none").addClass("d-block");
        }
        else {
            listPnaels.removeClass("d-none").addClass("d-block");
            panelView.removeClass("d-block").addClass("d-none");
        }
    }
    else {
        listPnaels.removeClass("d-none").addClass("d-block");
        panelView.removeClass("d-none").addClass("d-block");
    }
}
