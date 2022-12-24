function selectPageMusic(page) {

    var urlPage = $('meta[name="url-this-page"]').attr('content');
    var newUrl = urlPage+"?page="+page;

    var data = {
            "page": page
        };

    window.history.pushState(data, null, newUrl);

    searchMusicPage(page);
}

window.addEventListener('popstate', function(e) {

    var character = e.state;

    if (character == null) {
        searchMusicPage(firstPage)
    }
    else {
        searchMusicPage(character["page"]);
    }

});


function searchMusicPage(page) {
    var data = {
        "page": page ,
        "_token": $('meta[name="csrf-token-pager"]').attr('content')
    };

    $.ajax({
        url:  $('meta[name="url-search-music-page"]').attr('content') ,
        type: "POST",
        data: data ,
        success: function (result) {
            $("#form-items-play-list").html(result["top_list_music"]);
            $("#form_list_music").html(result["list_music"]);
            $("#form_pager").html(result["pager"]);
        }
    });

}