var timeStart = $("#label-for-time_start");
var timeEnd = $("#label-for-time_end");
var timeMin = 0;
var timeMax = 0;

function  returnPositionSelectedMusic(start , end ,min,  max) {
    timeStart.val(start);
    timeEnd.val(end);
    timeMin = min;
    timeMax = max;
}

function submitFormDataGroup(element) {
    submitNewPositionSelectedMusic();

    var isTrue= true;
    var timeStartVal = parseInt(timeStart.val());
    var timeEndVal = parseInt(timeEnd.val());
    if (timeStartVal<timeMin || timeEndVal>timeMax || timeEndVal < timeStartVal ||  timeStartVal >= timeEndVal){
        isTrue = false;
    }

    if (isTrue){
        $(element).parent().submit();
    }
}