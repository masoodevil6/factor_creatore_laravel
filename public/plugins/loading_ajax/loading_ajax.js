(function ($) {
    $.fn.loadingAjax = function () {
        var element = $(this);
        this.start = function () {
            var creatorElement = '<div id="loading-data-ajax" class="w-100 h-100 position-fixed" style="background: #2c2c2c52; top: 50%; left: 50%; transform: translate(-50%, -50%);"> <img class="position-absolute" style="top: 50%; left: 50%; transform: translate(-50%, -50%); " src="/plugins/loading_ajax/loading.gif" alt="loading data ..."> </div>';
            element.append(creatorElement);
        };
        this.end = function () {
            element.find("#loading-data-ajax").remove();
        };
        return this;
    }
})(jQuery);

