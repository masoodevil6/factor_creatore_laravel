function likeCommentUser(element , commentId) {
    likeOrDislikeCommentUser(element , commentId , 1);
}

function dislikeCommentUser(element , commentId) {
    likeOrDislikeCommentUser(element , commentId , -1);
}


function likeOrDislikeCommentUser(element , commentId , val) {
    var data= {
        "comment_id" : commentId ,
        "like_or_dislike" : val ,
        "_token": $('meta[name="csrf-token"]').attr('content')
    };
    $.ajax({
        url: $('meta[name="url-like-or-dislike-comment"]').attr('content'),
        type: "POST",
        data: data,
        success: function (result) {
            refreshIconLikeOrDislikeComment(element , result["like_or_dislike"] , result["count"])
        },
        dataType: "json"
    });
}

function refreshIconLikeOrDislikeComment(element , resultVal , $resCount) {
    var formLikeOrDislike = $(element).parent().parent();
    var iconDislikeComment = formLikeOrDislike.find(".icon_dislike_comment");
    var iconLikeComment = formLikeOrDislike.find(".icon_like_comment");
    var textCountLikeComment = formLikeOrDislike.find(".text_count_like_comment");

    iconDislikeComment.removeClass("fa-thumbs-down").removeClass("text-warning").addClass("fa-thumbs-o-down");
    iconLikeComment.removeClass("fa-thumbs-up").removeClass("text-warning").addClass("fa-thumbs-o-up");

    if(resultVal === 1){
        iconLikeComment.removeClass("fa-thumbs-o-up").addClass("fa-thumbs-up").addClass("text-warning");
    }
    else if(resultVal === -1){
        iconDislikeComment.removeClass("fa-thumbs-o-down").addClass("fa-thumbs-down").addClass("text-warning");
    }
    textCountLikeComment.text($resCount)
}