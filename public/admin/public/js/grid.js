$(document).ready(function(){

    ///// ======================================================

    var sidebarToggleHide = $("#sidebar-toggle-hide");
    var sidebarToggleShow = $("#sidebar-toggle-show");
    var sidebar = $("#sidebar");
    var sidebarWidth = sidebar.width()>0 ? sidebar.width() : "14rem";
    var mainBody = $("#main-body");
    var mainBodyMargin = sidebar.css("margin")>0 ? sidebar.css("margin") : "14rem";

    sidebarToggleHide.click(function () {
        sidebarToggleHide.attr("style", "display: none !important");
        sidebarToggleShow.attr("style", "display: block !important");
        sidebar.css("display" , "block");
        sidebar.animate({"width" : sidebarWidth , "opacity" : "100%"} , 300);
        mainBody.animate({"width" : "auto" , "margin-right" : mainBodyMargin} , 300);
    });

    sidebarToggleShow.click(function () {
        sidebarToggleHide.attr("style", "display: block !important");
        sidebarToggleShow.attr("style", "display: none !important");
        sidebar.css("display" , "block");
        sidebar.animate({"width" : "0" , "opacity" : "0"} , 300);
        mainBody.animate({"width" : "100%" , "margin-right" : "0"} , 300);
    });

    ///// ======================================================

    var bodyHeaderShow = $("#body-header-show");
    var bodyHeader = $("#body-header");

    bodyHeaderShow.click(function () {
        bodyHeader.toggle(300);
    });

    ///// ======================================================

    var SearchArea = $("#search-area");
    var btnSearchAreaHide = $("#search-area-hide");
    var btnSearchAreaShow = $("#search-area-show");
    var btnSearchAreaInput = $("#search-area-input");

    btnSearchAreaShow.click(function () {
        btnSearchAreaInput.css({"width" : "0"});
        SearchArea.addClass("d-md-inline");
        btnSearchAreaShow.removeClass("d-inline");
        btnSearchAreaInput.animate({"width" : "12rem"} , 300);
    });

    btnSearchAreaHide.click(function () {
        btnSearchAreaInput.animate({"width" : "0"} , 300);
        setTimeout(function () {
            btnSearchAreaShow.addClass("d-inline");
            SearchArea.removeClass("d-md-inline");
        },300);
    });

    ///// ======================================================

    var btnHeaderNotification = $("#header-notification-toggle");
    var headerNotification = $("#header-notification");

    var btnHeaderComment = $("#header-comment-toggle");
    var headerComment = $("#header-comment");

    var btnProfileComment = $("#header-profile-toggle");
    var headerProfile = $("#header-profile");

    btnHeaderNotification.click(function () {
        showAndHideToggleHeaders(0);
        headerNotification.fadeToggle(300);
    });

    btnHeaderComment.click(function () {
        showAndHideToggleHeaders(1);
        headerComment.fadeToggle(300);
    });

    btnProfileComment.click(function () {
        showAndHideToggleHeaders(2);
        headerProfile.fadeToggle(300);
    });


    function showAndHideToggleHeaders(indexToggole) {
        if (indexToggole !== 0){
            headerNotification.css("display" , "none");
        }
        if (indexToggole !== 1 ){
            headerComment.css("display" , "none");
        }
        if (indexToggole !== 2 ){
            headerProfile.css("display" , "none");
        }
    }


    ///// ======================================================

    var tabSidebarGroup = $(".sidebar-group-link");
    var sidebarDropdownToggle = tabSidebarGroup.find(".sidebar-dropdown-toggle");
    var sidebarDropdownToggleIcon = sidebarDropdownToggle.find(".angle");

    tabSidebarGroup.click(function () {
        var isHasAction = $(this).hasClass("sidebar-group-link-active");

        tabSidebarGroup.removeClass("sidebar-group-link-active");
        sidebarDropdownToggleIcon.removeClass("fa-angle-down").addClass("fa-angle-left");

        if(!isHasAction){
            $(this).addClass("sidebar-group-link-active");
            $(this).find(".sidebar-dropdown-toggle").find(".angle").removeClass("fa-angle-left").addClass("fa-angle-down");
        }
    });




    ///// ======================================================




    ///// ======================================================

});

function openFormNotification(url , token) {
    $.ajax({
        url: url,
        type:"Post",
        data : {"_token" : token},
        success: function (msg) {
            console.log(msg)
        }

    });
}

///// ======================================================

var btnFullScreen= $("#full-screen");
var iconScreenCompress= $("#screen-compress");
var iconScreenExpand= $("#screen-expand");

btnFullScreen.click(function () {
    toggleFullScreen();
});

function toggleFullScreen() {
    if ((document.fullScreenEnabled && document.fullScreenElement !== null)
        || (!document.mozFullScreen && !document.webkitIsFullScreen)){

        if (document.documentElement.requestFullscreen){
            document.documentElement.requestFullscreen();
        }
        else if (document.documentElement.mozRequestFullscreen){
            document.documentElement.mozRequestFullscreen();
        }
        else if (document.documentElement.webkitRequestFullScreen){
            document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        }


        iconScreenCompress.removeClass("d-none");
        iconScreenExpand.addClass("d-none");
    }
    else {

        if (document.cancelFullScreen){
            document.cancelFullScreen();
        }
        else  if (document.mozCancelFullScreen){
            document.mozCancelFullScreen();
        }
        else  if (document.webkitCancelFullScreen){
            document.webkitCancelFullScreen();
        }


        iconScreenExpand.removeClass("d-none");
        iconScreenCompress.addClass("d-none");

    }

}




function successToast(message) {

    var toastSuccessMessage =
        '<section class="toast-success toast" data-delay="5000">' +
        '<section class="toast-body py-3 d-flex bg-success text-white">' +
        '<strong class="ml-auto">'+message+'</strong>' +
        '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">' +
        '<span aria-hidden="true">&times;</span>' +
        '</button>' +
        '</section>' +
        '</section>';

    $('.toast-wrapper').append(toastSuccessMessage);
    $('.toast-success').toast('show').delay(5500).queue(function () {
        $(this).remove();
    });

}

function errorToast(message) {

    var toastErrorMessage =
        '<section class="toast-error toast" data-delay="5000">' +
        '<section class="toast-body py-3 d-flex bg-danger text-white">' +
        '<strong class="ml-auto">'+message+'</strong>' +
        '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">' +
        '<span aria-hidden="true">&times;</span>' +
        '</button>' +
        '</section>' +
        '</section>';

    $('.toast-wrapper').append(toastErrorMessage);
    $('.toast-error').toast('show').delay(5500).queue(function () {
        $(this).remove();
    });

}


///// ======================================================

function searchPanel(url) {

    var searchPanel = $.trim($("input[name=search-box-panel]").val());
    window.location.href = url+"?search="+searchPanel;
}