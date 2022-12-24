var messages = {
    "client_not_login" : "کاربر گرامی برای انجام این کار ابتدا باید وارد حساب خود شوید" ,
    "title_btn_login" : "ورود/ ثبت نام" ,

    "delete_form_favorite_list" : "موسیقی مورد نظر از لیست پخش مورد نظر حذف شد" ,
    "add_form_favorite_list" : "موسیقی مورد نظر به لیست پخش مورد نظر اضافه شد" ,
    "empty_title_favorite_category" : "ابتدا عنوانی را برای دسته موردن نظر خود انتخاب نمایید" ,

    "action_success" : "درخواست با موفقیت انجام شد" ,
    "action_error" : "مشکلی در پردازش اطلاعات رخ داده است" ,

    "action_error_empty_filed" : "لطفا برای انجام درخواست خود، فیلد های مورد نیاز را پر نمایید" ,
};


var errorOptionAlert = "error";
var successOptionAlert = "success";


////=======================================
//// alerts
////=======================================

///errors
function errorClientNotLogin(linkLogin) {
    $("main").alert_screen({
        text : messages["client_not_login"] ,
        link : linkLogin ,
        linkTitle : messages["title_btn_login"] ,
        type : errorOptionAlert
    })
}
function errorEmptyTitleFavoriteCategory() {
    $("main").alert_screen({
        text : messages["empty_title_favorite_category"] ,
        type : errorOptionAlert
    })
}
function messageActionError() {
    $("main").alert_screen({
        text : messages["action_error"] ,
        type : errorOptionAlert
    })
}
function messageActionErrorEmptyField() {
    $("main").alert_screen({
        text : messages["action_error_empty_filed"] ,
        type : errorOptionAlert
    })
}



///sucess
function messageActionSuccess() {
    $("main").alert_screen({
        text : messages["action_success"] ,
        type : successOptionAlert
    })
}

function actionToFavoriteListMusic(add) {
    if (add){
        $("main").alert_screen({
            text : messages["add_form_favorite_list"] ,
            type : successOptionAlert
        })
    }
    else {
        $("main").alert_screen({
            text : messages["delete_form_favorite_list"] ,
            type : successOptionAlert
        })
    }

}