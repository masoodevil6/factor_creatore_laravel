///// ============================================================
/// client like music
///// ============================================================

function setLikeMusic() {
    var btnLike = $(".form-btn-like-music");
    var iconLike = btnLike.find(".icon-like-music");
    var iconNotLike = btnLike.find(".icon-not-like-music");
    var numLike = btnLike.find(".text-num-liked-music");

    var data = {
        "music_slug": $('meta[name="slug-music-player"]').attr('content') ,
        "_token": $('meta[name="csrf-token-music-player"]').attr('content')
    };


    $.ajax({
        url:  $('meta[name="url-user-like-music"]').attr('content') ,
        type: "POST",
        data: data ,
        success: function (result) {

            var status = result["status"];

            if (status == 0){
                errorClientNotLogin($('meta[name="url-user-login"]').attr('content'));
            }
            else{
                if (status == 1){
                    iconLike.removeClass("d-none");
                    iconNotLike.addClass("d-none");
                }
                if (status == 2){
                    iconLike.addClass("d-none");
                    iconNotLike.removeClass("d-none");
                }
                numLike.text(result["num"]);
                messageActionSuccess();
            }

        }
    });
}