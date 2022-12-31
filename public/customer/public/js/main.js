
<!--header_action-->
var progressBarScrollPage = $("#progress-scroll-bar");
var bodyHeight = 0;
var scrollTopWindow = 0;
var percentScrollWindowTop = 0;

window.onscroll = function() {do_scroll_progress()};
do_scroll_progress();
function do_scroll_progress() {

    bodyHeight = $("html").outerHeight() - window.innerHeight;
    scrollTopWindow = $(window).scrollTop();
    percentScrollWindowTop = (scrollTopWindow / bodyHeight)*100;

    progressBarScrollPage.animate({"width" : percentScrollWindowTop + "%"} , 15);
}

$(document).ready(function(){
    $('.dropdown-toggle').dropdown()
});






var blurNavMobile = $("#blur-nav-mobile");
var nav = $("#nav");

function OpenOrCloseNavPhone() {
    if (nav.hasClass("nav-open")){
        CloseNavPhone();
    }
    else{
        OpenNavPhone();
    }
}

function OpenNavPhone() {
    blurNavMobile.removeClass("d-none");
    nav.addClass("nav-open")
}

function CloseNavPhone() {
    blurNavMobile.addClass("d-none");
    nav.removeClass("nav-open");
}