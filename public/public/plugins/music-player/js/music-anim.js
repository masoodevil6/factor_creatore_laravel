///========================================
/// params
///========================================

var formMusicSubtitle = $("#form-music-subtitles");
var widthMainWindow;
var heightMainWindow;

var formBitmapPlayerMusicSubtitle = $("#form-bit-map-player-music-subtitle");

var whiteBoardMusicSubtitle = $("#white-board-music-subtitle");
var formImageWidth;
var formImageHeight;
var min = 40;
var windowWidth;
var windowHeight;

var progressSeekBar = $("#progress-seek-bar");

var formBtnPlayOrPause = $("#form-btn-play-or-pause");
var iconPlayMusic = $(".icon-play-music");
var iconPauseMusic = $(".icon-pause-music");


var intervalDurationMusic;
var statusScale = 0;
var lastAngle = 0;

var intervalEffectMusic;
var infoSubtitle;


///// ====================================================================
/// resize
///// ====================================================================

$(window).resize(function(){
    getInfoResizeWindow();
});
getInfoResizeWindow();
function getInfoResizeWindow() {

    widthMainWindow = formMusicSubtitle.width();
    heightMainWindow = formMusicSubtitle.height();

    var screenWidth = $( window ).width();
    if (screenWidth < 992){
        formImageWidth = 900;
        formImageHeight = 720;
    }
    else if (screenWidth >= 992 && screenWidth < 1200){
        formImageWidth = 1200;
        formImageHeight = 960;
    }
    else if (screenWidth >= 1200){
        formImageWidth = 1500;
        formImageHeight = 1200;
    }


    windowWidth = Math.round(formImageWidth/3);
    windowHeight = Math.round(formImageHeight/3);


    if (statusScale <= 1){
        setScallMainWindow();
    }

}


///========================================
/// anim subtitle music
///========================================

defineIntervalDurisionMusic();
function defineIntervalDurisionMusic() {
    intervalDurationMusic = setInterval(readySubtitlesMusic , 50);
}

function clearIntervalDurisionMusic() {
    clearInterval(intervalDurationMusic)
}

function readySubtitlesMusic() {
    var currentTimeMusic = musicPlayer.currentTime*100;
    var durationTime = musicPlayer.duration*100;

    for(var i=0; i < data.length ; i++){
        if (data[i]["time_start"] <= currentTimeMusic &&  data[i]["time_end"] >= currentTimeMusic){
            var checkExist = checkExistSubtitle(data[i]);
            if (!checkExist){
                createElementSubtitle(data[i]);
            }
            if (statusScale <= 1){
                statusScale = 2;
            }
        }
        else{
            checkFormRemoveElementSubtitle(data[i]);
        }
    }

    if (statusScale == 0 || statusScale==3){
        if ($(".itemMusicSubtitle").length == 0){
            setScallMainWindow();
        }
    }

    setPercentProgress(currentTimeMusic , durationTime);

}

function checkExistSubtitle(subtitle) {
    var itemMusicSubtitle = $(".itemMusicSubtitle");
    var existItem=false;
    for(var i=0; i < itemMusicSubtitle.length ; i++){
        if (itemMusicSubtitle.eq(i).attr("data-id") == subtitle["id"]){
            existItem =true;
            break;
        }
    }
    return existItem;
}

function checkFormRemoveElementSubtitle(subtitle) {
    var elementSubtitle = getElementSubtitleSelected(subtitle["id"]);
    if (elementSubtitle != null){
        elementSubtitle.remove();
        statusScale = 3;
    }
}

function getElementSubtitleSelected(elementId) {

    var element=null;
    var itemMusicSubtitle = $(".itemMusicSubtitle");
    for(var i=0; i < itemMusicSubtitle.length ; i++){
        if (itemMusicSubtitle.eq(i).attr("data-id") == elementId){
            element = itemMusicSubtitle.eq(i);
            break;
        }
    }
    return element;
}

function createElementSubtitle(subtitle) {

    var textSubtitle = readyTextSubtitle(subtitle["text"]);
    var position = setRandwomPosition();

    var element = '<span class="itemMusicSubtitle text-center d-inline-block position-absolute align-middle '+font+'" data-id="'+subtitle["id"]+'" ' +
        'style="top:'+position["top"]+'px;left:'+position["left"]+'px;transform:rotate('+position["angle"]+'deg) translate(0%, 45%);width:'+windowWidth+'px;height:'+windowHeight+'px;">'+textSubtitle+'</span> ';
    whiteBoardMusicSubtitle.append(element);

    setScallTextSubtitle(position);

    infoSubtitle = subtitle;
    defineIntervalEffectMusic();
}

function setPercentProgress(currentTimeMusic , durationTime) {

    var percent = 0;
    if (!isNaN(durationTime)){
        percent = currentTimeMusic/durationTime;
    }
    var angleProgress = 265- Math.round(percent*85);
    progressSeekBar.css("transform" , "rotate(-"+angleProgress+"deg)");

}


///========================================
/// Ready window and subtitles
///========================================

function readyTextSubtitle(text) {
    var finalText = "";
    var totalAlpha = 5;
    var splitText = text.split(" ");
    for(var i=1; i <= splitText.length ; i++){
        if (i%totalAlpha == 0){
            finalText +="<br>";
        }
        finalText +=splitText[i-1]+" ";
    }
    return finalText;
}

function calculateAngleMainWindow(angle) {

    var resultAngle = 0;

    var transAngleOne = Math.abs(lastAngle - angle);
    var transAngleTwo = Math.abs(360 - transAngleOne);
    var minTransAngle = Math.min(transAngleOne , transAngleTwo);

    if (minTransAngle == transAngleOne){
        resultAngle = 360 - angle;
    }
    else if (minTransAngle == transAngleTwo){
        resultAngle = -angle;
    }

    lastAngle = angle;

    return resultAngle;
}

function setRandwomPosition() {

    var positionX = Math.floor(Math.random()*formImageWidth);
    var positionY = Math.floor(Math.random()*formImageHeight);
    var angle = Math.floor(Math.random()*360);


    var top=min;
    var bottom=min;
    var right=min;
    var left=min;

    /*if (angle >=0 && angle<90){
        top = min;
        bottom = min + Math.abs(windowHeight*Math.cos(angle)) + Math.abs(windowWidth*Math.sin(angle));
        right = min +Math.abs(windowWidth*Math.cos(angle));
        left = min +  Math.abs(windowHeight*Math.sin(angle));
    }
    else if (angle >=90 && angle<180){
        top = min + Math.abs(windowHeight*Math.cos(angle));
        bottom = min + Math.abs(windowWidth*Math.sin(angle));
        right = min;
        left = min +  Math.abs(windowHeight*Math.sin(angle)) + Math.abs(windowWidth*Math.cos(angle));
    }
    else if (angle >=180 && angle<270){
        top = min + Math.abs(windowWidth*Math.sin(angle)) + Math.abs(windowHeight*Math.cos(angle));
        bottom = min;
        right =min + Math.abs(windowHeight*Math.sin(angle));
        left = min + Math.abs(windowWidth*Math.cos(angle));
    }
    else if (angle >=270 && angle<=360){
        top = min + Math.abs(windowWidth*Math.sin(angle));
        bottom = min + Math.abs(windowHeight*Math.cos(angle));
        right =min + Math.abs(windowWidth*Math.cos(angle)) + Math.abs(windowHeight*Math.sin(angle));
        left = min;
    }*/

    if (angle >=0 && angle<90){
        top = min;
        bottom = min + windowHeight + windowWidth;
        right = min + windowWidth;
        left = min +  windowHeight;
    }
    else if (angle >=90 && angle<180){
        top = min + windowHeight;
        bottom = min + windowWidth;
        right = min;
        left = min +  windowHeight + windowWidth;
    }
    else if (angle >=180 && angle<270){
        top = min + windowWidth + windowHeight;
        bottom = min;
        right =min + windowHeight;
        left = min + windowWidth;
    }
    else if (angle >=270 && angle<=360){
        top = min + windowWidth;
        bottom = min + windowHeight;
        right =min + windowWidth + windowHeight;
        left = min;
    }


    if (positionX < left){
        positionX = Math.round(left);
    }
    else if (positionX > formImageWidth - right){
        positionX = Math.round(formImageWidth - right);
    }

    if (positionY < top){
        positionY = Math.round(top);
    }
    else if (positionY > formImageHeight - bottom){
        positionY =  Math.round(formImageHeight - bottom);
    }

    return {
        "top" : positionY ,
        "left" : positionX ,
        "angle" : angle
    }
}

function setScallTextSubtitle(positionData) {

    whiteBoardMusicSubtitle.stop(false , false);

    var transAngle = calculateAngleMainWindow(positionData["angle"]);

    formBitmapPlayerMusicSubtitle.css({
        "transform" : "translate(-50%, -50%) rotate("+transAngle+"deg)"
    });

    whiteBoardMusicSubtitle.css({
        "transform" : "translateX(-"+positionData["left"]+"px) translateY(-"+positionData["top"]+"px) rotate("+transAngle+"deg)" ,
        "transform-origin" : (positionData["left"])+"px "+(positionData["top"])+"px",
    });

    whiteBoardMusicSubtitle.animate({
        "width" :  formImageWidth + "px" ,
        "height" : formImageHeight+ "px"
    } , 1000);

}

function setScallMainWindow() {

    whiteBoardMusicSubtitle.stop(false , false);

    var scaleX = widthMainWindow/formImageWidth;
    var scaleY = heightMainWindow/formImageHeight;
    var scale = Math.max(scaleX , scaleY);

    formBitmapPlayerMusicSubtitle.css({
        "transform" : "translate(-50%, -50%) rotate(0deg)"
    });

    whiteBoardMusicSubtitle.css({
        "transform" : "rotate(0deg)" ,
        "transform-origin" : ""
    });

    whiteBoardMusicSubtitle.animate({
        "width" : scale*formImageWidth ,
        "height" : scale*formImageHeight
    } , 1000);

    statusScale = 1;
}


///========================================
/// Ready AnimateEffects
///========================================

function defineIntervalEffectMusic() {
    intervalEffectMusic = setInterval(readyEffectSubtitleMusic , 100);
}

function clearIntervalEffectMusic() {
    clearInterval(intervalDurationMusic)
}

function readyEffectSubtitleMusic() {

    var currentTimeMusic = musicPlayer.currentTime*100;
    var effects = infoSubtitle["music_subtitle_effects"];

    for(var i=0; i < effects.length ; i++){

        if (effects[i]["time_start"] <= currentTimeMusic &&  effects[i]["time_end"] >= currentTimeMusic && effects[i]["active"]==0){
            setEffetOnSubtitleMusic(effects[i] , infoSubtitle["id"]);
            effects[i]["active"] = 1;
        }
    }
}

function setEffetOnSubtitleMusic(infoEffects , elementId) {
    var durition = infoEffects["time_end"] - infoEffects["time_start"];
    var effects = infoEffects["effect"];
    var elementSubtitle = getElementSubtitleSelected(elementId);

    var infoAnimate = [];
    for(var i=0; i<effects.length ; i++){
        var itemEffect = effects[i];

        var objectAnimate = {};
        for(var j=0; j<itemEffect["effect"].length ; j++){
            var attrSelected = itemEffect["effect"][j];

            var defaultValueAttr = 100;
            if (elementSubtitle.css(attrSelected) != "none"){
                defaultValueAttr = parseInt(elementSubtitle.css(attrSelected));
            }

            objectAnimate[attrSelected] = (itemEffect["value"]/100)*defaultValueAttr;

        }
        var itemFrame = {};
        itemFrame["frames"] = objectAnimate;
        itemFrame["time"] = (itemEffect["duration"]/100)*durition;

        infoAnimate.push(itemFrame);
    }


    for (var a=0 ; a<infoAnimate.length ; a++){
        elementSubtitle.animate(infoAnimate[a]["frames"] , infoAnimate[a]["time"]);
    }

}
