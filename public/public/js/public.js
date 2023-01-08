
///// format num
function numberFormat(value , num_char=3 , char ="," ) {

    var info_splice_num = Math.pow(10 , num_char);

    if (value >= info_splice_num){

        ///var num = value;
        var num = value;
        var n = 0;

        while( Math.floor(num/Math.pow(info_splice_num , n+1)) > 0 ){
            n++;
        }


        var array_num =[];
        for (var i = n ; i >= 0 ; i--){


            var number = Math.floor( (num)/Math.pow(info_splice_num , i) );
            num -= Math.floor((num)/Math.pow(info_splice_num , i))*Math.pow(info_splice_num , i);

            if( i !== n){

                var x_num_ten = 0;
                var num_ten = "";

                while( Math.floor(number/Math.pow(10 , x_num_ten+1)) > 0 ){
                    x_num_ten++;
                }

                for (var t=0 ; t < num_char - x_num_ten-1 ; t++){
                    num_ten +="0";
                }
                array_num.push( num_ten + number.toString()  );

            }
            else {
                array_num.push( number.toString()  );
            }

        }


        var result ="";
        for (var x = 0 ; x < array_num.length ; x++){

            if (x < array_num.length - 1){
                result += array_num[x] + char;
            }
            else {
                result += array_num[x]
            }
        }


        return result;

    }
    else {
        return value;
    }

}