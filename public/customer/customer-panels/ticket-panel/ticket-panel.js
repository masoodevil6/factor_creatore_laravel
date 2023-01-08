var formListTickets =$("#form-list-panel-tickets");
var formInfoTickets =$("#form-info-panel-tickets");
var formSubmitTickets =$("#form-submit-panel-tickets");
var ticketId=null;

function selectTicketInfo(ticketId) {

    var data= {
        "ticket_id" : ticketId ,
        "_token": $('meta[name="csrf-token-customer-panel"]').attr('content')
    };
    var loading =  $("body").loadingAjax();
    $.ajax({
        url: $('meta[name="url-get-list-info-ticket"]').attr('content'),
        type: "POST",
        data: data,
        beforeSend: function () {
            loading.start();
        },
        success: function (result) {
            goToInfoPanelTickets();
            $("#list_info_tickets").html(result)
        },
        complete: function () {
            loading.end();
        }
    });
}

function submitNewTicketClient() {

    var $ticketTitle = $.trim($("input[name=title]").val());
    var $ticketText = $.trim($("textarea[name=text]").val());
    var $ticketCategoryId = $("select[name=ticket_category_id]").val();

    var isTrue = true;
    if (ticketId == null && ($ticketTitle == "" || $ticketText == "")){
        isTrue = false;
    }
    else if (ticketId > 0 && $ticketText == ""){
        isTrue = false;
    }

    if (isTrue){
        var data= {
            "title" : $ticketTitle ,
            "text" : $ticketText ,
            "_token": $('meta[name="csrf-token-customer-panel"]').attr('content')
        };
        data["ticket_id"] = null;
        if (ticketId > 0){
            data["ticket_id"] = ticketId;
        }
        data["ticket_category_id"] = null;
        if ($ticketCategoryId > 0){
            data["ticket_category_id"] = $ticketCategoryId;
        }
        var loading =  $("body").loadingAjax();
        $.ajax({
            url: $('meta[name="url-submit-new-ticket"]').attr('content'),
            type: "POST",
            data: data,
            beforeSend: function () {
                loading.start();
            },
            success: function (result) {
                if (result == 1){
                    messageActionSuccess();
                    goToThisFirstFormPanel();
                }
                else {
                    messageActionError();
                }
            },
            complete: function () {
                loading.end();
            }
        });
    }
    else {
        messageActionErrorEmptyField();
    }
}



function goToFormSubmitNewTicketClient(myTicketId=0 , title='') {
    ticketId = myTicketId;
    var selectCategory = $("select[name=ticket_category_id]");
    var ticketTitle = $("input[name=title]");
    if (ticketId > 0){
        selectCategory.prop("disabled" , true);
        ticketTitle.prop("disabled" , true);
    }
    else {
        selectCategory.prop("disabled" , false);
        ticketTitle.prop("disabled" , false);
    }
    ticketTitle.val(title);
    goToInfoSubmitTickets()
}
function goBackFromSubmitTicketPanel() {
    if (ticketId > 0){
        goToInfoPanelTickets();
    }
    else {
        goToMannPanelTickets();
    }
    ticketId=null;
}
function goToMannPanelTickets() {
    formListTickets.removeClass("d-none");
    formInfoTickets.addClass("d-none");
    formSubmitTickets.addClass("d-none");
}
function goToInfoPanelTickets() {
    formListTickets.addClass("d-none");
    formInfoTickets.removeClass("d-none");
    formSubmitTickets.addClass("d-none");
}
function goToInfoSubmitTickets() {
    formListTickets.addClass("d-none");
    formInfoTickets.addClass("d-none");
    formSubmitTickets.removeClass("d-none");
}