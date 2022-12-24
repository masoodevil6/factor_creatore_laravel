(function ($) {
    $.fn.loadingAjax = function () {
        var element = $(this);
        this.start = function () {
            var creatorElement = '<div id="loading-data-ajax" class="w-100 h-100 bg-white position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%);"> <img class="position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%); width: 50px; height: 50px" src="public/plugins/loading_ajax/loading.gif" alt="loading data ..."> </div>';
            element.append(creatorElement);
        };
        this.end = function () {
            element.find("#loading-data-ajax").remove();
        };
        return this;
    }
})(jQuery);

