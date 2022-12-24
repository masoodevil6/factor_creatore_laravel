var animated_error_show;
(function ($) {

    $.fn.alert_screen = function (option) {
        return this.each(function () {

            var setting = $.extend({
                width: "80%",
                type : "error",
                bgBorder: "#504738",
                colorText: "#ffffff",
                bottom : "10",
                time_show: 4000,
                text : "insert alert!" ,
                link : "" ,
                linkTitle : ""
            },option);


            clearTimeout(animated_error_show);
            $(".alert_result").remove();


            var mother_element = $(this);

            var link_element="";
            if (setting.link != ""){
                link_element = "<a class='shadow btn  btn-warning my-1 mx-2 py-1 px-2' href='"+setting.link+"'>"+setting.linkTitle+"</a>";
            }

            var alert_element = "<span class='alert_result yekan fontlg'>"+setting.text+link_element+"</span>";

            mother_element.append(alert_element);
            var alert_result_element = $(".alert_result");

            alert_result_element.css({
                "width" : setting.width,
                "border-color" : setting.bgBorder,
                "color" : setting.colorText,
                "bottom" : setting.bottom
            });


            if (setting.type == "error"){
                alert_result_element.css({
                    "background-color" : "#E53935"
                });
            }
            else {
                alert_result_element.css({
                    "background-color" :  "#43A047"
                });
            }


            alert_result_element.show(500);
            animated_error_show = setTimeout(function () {
                alert_result_element.hide(500)
            },setting.time_show)

            alert_result_element.click(function () {
                alert_result_element.hide(500)
            })
        })
    }
})(jQuery);