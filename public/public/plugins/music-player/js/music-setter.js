var data;
function setValData(data) {
    this.data = data;
    console.log(data)
    selectRandomFont();
}

var font;
function selectRandomFont() {
    var random = Math.floor(Math.random()*6);
    if (random == 0){
        font="font-beirut";
    }
    else if (random == 1){
        font="font-ghalam";
    }
    else if (random == 2){
        font="font-ramollah";
    }
    else if (random == 3){
        font="font-ghalam";
    }
    else if (random == 4){
        font="font-hesam";
    }
    else if (random == 5){
        font="font-majik";
    }
}