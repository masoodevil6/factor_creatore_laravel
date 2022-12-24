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
    var timeStartVal = timeStart.val();
    var timeEndVal = timeEnd.val();
    if (timeStartVal<timeMin-250 || timeEndVal>timeMax+250 || timeEndVal < timeStartVal ||  timeStartVal >= timeEndVal){
        isTrue = false;
    }

    if (isTrue){
        $(element).parent().submit();
    }
}