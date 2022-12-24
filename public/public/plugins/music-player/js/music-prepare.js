///=======================================
/// play and pause music-player
///========================================
var musicPlayer = document.getElementById("music-player");
var musicSubtitles = [];

musicPlayer.onpause= function (ev) {
    setIconPlayMusic();
};

musicPlayer.onplay= function (ev) {
    setIconPauseMusic();
};

musicPlayer.onseeked= function (ev) {

};

musicPlayer.onended= function (ev) {
    readyMusicSubttitles("")
};

///========================================
/// anim subtitle music
///========================================

function playOrPauseMusicSelected() {
    if (musicPlayer.paused == false) {
        musicPlayer.pause();
        setIconPlayMusic();
    } else {
        musicPlayer.play();
        setIconPauseMusic();
    }
}

function refreshThisMusic() {
    musicPlayer.currentTime = 0;
    musicPlayer.play();
    setIconPauseMusic();
}

function setIconPlayMusic() {
    iconPlayMusic.removeClass("d-none");
    iconPauseMusic.addClass("d-none");
    showAnimBtnPlayOrPause();
}

function setIconPauseMusic() {
    iconPlayMusic.addClass("d-none");
    iconPauseMusic.removeClass("d-none");
    showAnimBtnPlayOrPause();
}

function showAnimBtnPlayOrPause() {
    formBtnPlayOrPause.css("opacity" , 1);
    setTimeout(function () {
        formBtnPlayOrPause.css("opacity" , 0);
    } , 1000);
}