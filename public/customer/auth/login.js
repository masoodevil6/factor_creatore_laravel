var countDownDate = 1;
var timer = $("#timer");
var resendOtp = $("#resend-otp");

function setDefaultTime(timerDown) {
    countDownDate = new Date().getTime() + timerDown;
}

var x = setInterval(function() {

    var now = new Date().getTime();

    var distance = countDownDate - now;

    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    if(minutes == 0){
        timer.html(' ارسال مجدد کد تایید تا ' + seconds + ' ثانیه دیگر ')
    }
    else{
        timer.html(' ارسال مجدد کد تایید تا ' + minutes + ' دقیقه و ' + seconds + ' ثانیه دیگر ');
    }

    if (distance < 0) {
        clearInterval(x);
        timer.addClass("d-none");
        resendOtp.removeClass("d-none");

        $("#form-send-result").addClass("d-none");
        $("#expired-code").removeClass("d-none");
    }
}, 1000);