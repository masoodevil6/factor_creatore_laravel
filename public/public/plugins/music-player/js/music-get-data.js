///========================================
/// get music form server and show
///========================================

var dataMusic={};
function setDataMusic(mDataMusic) {
    dataMusic = mDataMusic;
}

function setPlayMusicSelected(musicSlug) {
    var dataMusic = {
        "music_slug" : musicSlug ,
        "this_music" : 1
    };
    setDataMusic(dataMusic);
    readyMusicSubttitles();
    screenGoToMusicPlayer();
}

function setNextMusic(singerSlug="") {
    readyMusicSubttitles(singerSlug);
}

function readyMusicSubttitles(singerSlug="") {

    var data= getParamsFindMusic(singerSlug);

    $.ajax({
        url:  $('meta[name="url-next-music-player"]').attr('content') ,
        type: "POST",
        data: data ,
        success: function (result) {

            $("#main-section-form-music-player").html(result["view"]);

            if (result["status"] == 1){
                setTimeout(function () {
                    var musicPlayer = document.getElementById("music-player");
                    var formBtnPlayOrPause = $("#form-btn-play-or-pause");
                    var iconPlayMusic = $(".icon-play-music");
                    var iconPauseMusic = $(".icon-pause-music");

                    musicPlayer.play();
                    iconPlayMusic.addClass("d-none");
                    iconPauseMusic.removeClass("d-none");
                    formBtnPlayOrPause.css("opacity" , 1);
                    setTimeout(function () {
                        formBtnPlayOrPause.css("opacity" , 0);
                    } , 1000);

                    screenGoToMusicPlayer(1000);

                } , 500)
            }
        }
    });
}

function getParamsFindMusic(singerSlug) {
    var data = {
        "_token": $('meta[name="csrf-token-music-player"]').attr('content')
    };

    ///params
    if ("singer_slug" in dataMusic){
        data["singer_slug"] = dataMusic["singer_slug"];
    }
    else if (singerSlug != ""){
        data["singer_slug"] = singerSlug;
    }


    if ("type_category" in dataMusic){
        data["type_category"] = dataMusic["type_category"];
    }


    if ("filter_id" in dataMusic){
        data["filter_id"] = dataMusic["filter_id"];
    }


    if ("filter_years" in dataMusic){
        data["filter_years"] = dataMusic["filter_years"];
    }


    if ("music_slug" in dataMusic){
        data["music_slug"] = dataMusic["music_slug"];
    }
    else {
        data["music_slug"] = $('meta[name="slug-music-player"]').attr('content');
    }


    if ("this_music" in dataMusic){
        data["this_music"] = dataMusic["this_music"];

        if (! "music_slug" in dataMusic){
            data["music_slug"] = $('meta[name="slug-music-player"]').attr('content');
        }
    }

    if ("is_id" in dataMusic){
        data["is_id"] = dataMusic["is_id"];
    }

    return data;
}

var timeOutScreen;
function screenGoToMusicPlayer(timer = 0) {
    if (timer == 0){
        animeScreenGoToMusicPlayer()
    }
    else {
        if(timeOutScreen != null){
            clearTimeout(timeOutScreen)
        }
        timeOutScreen = setTimeout(animeScreenGoToMusicPlayer() , timer);
    }
}

function animeScreenGoToMusicPlayer() {
    var scrollDiv = document.getElementById("form-music-player").offsetTop;
    window.scrollTo({ top: scrollDiv - 150, behavior: 'smooth'});
}