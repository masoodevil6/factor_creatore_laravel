<style>
    @font-face{
        font-family: Vazir;
        src: url("/public/fonts/Vazir/Vazir-Regular.ttf") format("truetype");
    }
    *{
        direction: rtl;
        text-align: right;
        font-family:  Vazir;
    }







    /*-------------------------------------*/
    /*box shadow*/
    /*-------------------------------------*/


    .box_shadow_1{
        box-shadow:           0 0 8px #4a4a4a;
        -webkit-box-shadow:   0 0 8px #4a4a4a ;
        -moz-box-shadow:      0 0 8px #4a4a4a ;
    }
    .box_shadow_2{
        box-shadow:           0 2px 0 #fff6 inset , 0 -2px 0 #38383866 inset;
        -webkit-box-shadow:   0 2px 0 #fff6 inset , 0 -2px 0 #38383866 inset;
        -moz-box-shadow:      0 2px 0 #fff6 inset , 0 -2px 0 #38383866 inset;
    }



    .box_shadow_effect_black{
        box-shadow:           0 0 8px #3c3c3c  , 0 2px 0 #fff6 inset , 0 -2px 0 #38383866 inset;
        -webkit-box-shadow:   0 0 8px #3c3c3c  , 0 2px 0 #fff6 inset , 0 -2px 0 #38383866 inset;
        -moz-box-shadow:      0 0 8px #3c3c3c  , 0 2px 0 #fff6 inset , 0 -2px 0 #38383866 inset;
    }
    .box_shadow_effect_blue{
        background: #00baff;
        box-shadow: 0 0 8px #686767 , 0 -20px 20px #217b9c  inset;
        -webkit-box-shadow: 0 0 8px #686767 , 0 -20px 20px #217b9c  inset;
        -moz-box-shadow: 0 0 8px #686767 , 0 -20px 20px #217b9c inset;
    }








    /*-------------------------------------*/
    /*border*/
    /*-------------------------------------*/

    .border_width_1{
        border-width: 1px;
    }
    .border_width_2{
        border-width: 2px;
    }
    .border_width_3{
        border-width: 3px;
    }
    .border_width_4{
        border-width: 4px;
    }




    .border_white_full{
        border-color: white;
        border-style: solid;
    }
    .border_white_top{
        border-top-color: white;
        border-top-style: solid;
    }
    .border_white_left{
        border-left-color: white;
        border-left-style: solid;
    }
    .border_white_right{
        border-right-color: white;
        border-right-style: solid;
    }
    .border_white_bottom{
        border-bottom-color: white;
        border-bottom-style: solid;
    }





    .border_silver_full{
        border-color: #5a5a5a;
        border-style: solid;
    }
    .border_silver_top{
        border-top-color: #5a5a5a;
        border-top-style: solid;
    }
    .border_silver_left{
        border-left-color: #5a5a5a;
        border-left-style: solid;
    }
    .border_silver_right{
        border-right-color: #5a5a5a;
        border-right-style: solid;
    }
    .border_silver_bottom{
        border-bottom-color: #5a5a5a;
        border-bottom-style: solid;
    }





    .border_black_full{
        border-color: #000000;
        border-style: solid;
    }
    .border_black_top{
        border-top-color: #000000;
        border-top-style: solid;
    }
    .border_black_left{
        border-left-color: #000000;
        border-left-style: solid;
    }
    .border_black_right{
        border-right-color: #000000;
        border-right-style: solid;
    }
    .border_black_bottom{
        border-bottom-color: #000000;
        border-bottom-style: solid;
    }



    .border_red_full{
        border-color: red;
        border-style: solid;
    }
    .border_red_top{
        border-top-color: red;
        border-top-style: solid;
    }
    .border_red_left{
        border-left-color: red;
        border-left-style: solid;
    }
    .border_red_right{
        border-right-color: red;
        border-right-style: solid;
    }
    .border_red_bottom{
        border-bottom-color: red;
        border-bottom-style: solid;
    }



    .border_blue_full{
        border-color: blue;
        border-style: solid;
    }
    .border_blue_top{
        border-top-color: blue;
        border-top-style: solid;
    }
    .border_blue_left{
        border-left-color: blue;
        border-left-style: solid;
    }
    .border_blue_right{
        border-right-color: blue;
        border-right-style: solid;
    }
    .border_blue_bottom{
        border-bottom-color: blue;
        border-bottom-style: solid;
    }














    /*-------------------------------------*/
    /*background*/
    /*-------------------------------------*/





    .background_white_bottom_1{
        background-color: rgba(255, 255, 255, 0.16);
    }

    .background_white_bottom_2{
        border-bottom: rgba(255, 252, 252, 0.48) solid 2px;
    }
    .background_white_3{
        background-color: white;
    }











    .background_orange_1{
        background-color: #f2dbb9;
    }
    .background_orange_2{
        background-color: rgba(242, 219, 185, 0.73);
    }
    .background_yellow_3{
        background-color: #ffd4a8;
    }
    .background_orange_4{
        background-color: #ffc876;
    }
    .background_yellow_5{
        background-color: #ffbb3f;
    }








    .background_green_1{
        background-color: #a6f9c4;
    }
    .background_green_2{
        background-color: #4dd657;
    }
    .background_green_3{
        background-color: #399841;
    }
    .background_green_4{
        background-color: #01710a;
    }




    .background_blue_1{
        background-color: #d5fcff /*#bcdbf3*/;
    }
    .background_blue_2{
        background-color: #b9e0ee /*#bcdbf3*/;
    }
    .background_item_3{
        background-color: #33daff;
    }
    .background_blue_4{
        background-color: #02ccf5;
    }
    .background_blue_5{
        background-color: #017fff;
    }
    .background_blue_6{
        background-color: #2c73b4;
    }
    .background_blue_7{
        background-color: #19496c;
    }





    .background_red_1{
        background-color: #ffbcbc;
    }
    .background_red_2{
        background: #ff3535;
    }
    .background_red_3{
        background-color: #c60202;
    }





    .background_black_1{
        background-color: #e3e3e3;
    }
    .background_black_2{
        background-color: #d8d8d8;
    }
    .background_black_3{
        background-color: #b9b9b9;
    }
    .background_black_4{
        background-color: #62646d;
    }
    .background_black_5{
        background-color: #3c3b3b;
    }



    .background_black_glass_1{
        background-color: rgba(169, 169, 169, 0.35);
    }
    .background_black_glass_2{
        background-color: rgba(68, 68, 68, 0.50);
    }











    .color_white_1{
        color: white;
    }





    .color_block_1{
        color: #787777;
    }
    .color_block_2{
        color: #3c3b3b;
    }
    .color_block_3{
        color: #161515;
    }









    .color_red_1{
        color: #d60b00;
    }
    .color_red_2{
        color: #6a0101;
    }


    .color_green_1{
        color: #5bbf0f;
    }
    .color_green_2{
        color: #37750a;
    }



    .color_yellow_1{
        color: #edf935;
    }
    .color_yellow_2{
        color: #543400;
    }



    .color_blue_1{
        color: #02b5de;
    }
    .color_blue_2{
        color: #46757c;
    }










    .display_none{
        display: none;
    }
    .display_flow_root{
        display: flow-root;
    }
    .display_block{
        display: block;
    }
    .display_inline_block{
        display: inline-block;
    }
    .display_inline_flex{
        display: inline-flex;
    }
    .display_table{
        display: table;
    }
    .display_flex{
        display: flex;
    }
    .flex_align_stretch{
        align-items: stretch;
    }
    .flex_1{
        flex: 1;
    }
    .flex_2{
        flex: 2;
    }









    .float_right{
        float: right;
    }
    .float_left{
        float: left;
    }










    .width_250px_standard{
        width: 250px;
    }
    .width_300px_standard{
        width: 300px;
    }
    .width_350px_standard{
        width: 350px;
    }





    .width_100_percent{
        width: 100%;
    }
    .width_95_percent{
        width: 95%;
    }
    .width_90_percent{
        width: 90%;
    }
    .width_85_percent{
        width: 85%;
    }
    .width_80_percent{
        width: 80%;
    }
    .width_75_percent{
        width: 75%;
    }
    .width_70_percent{
        width: 70%;
    }
    .width_65_percent{
        width: 65%;
    }
    .width_60_percent{
        width: 60%;
    }
    .width_55_percent{
        width: 55%;
    }
    .width_50_percent{
        width: 50%;
    }
    .width_45_percent{
        width: 45%;
    }
    .width_40_percent{
        width: 40%;
    }
    .width_35_percent{
        width: 35%;
    }
    .width_33_percent{
        width: 33.33%;
    }
    .width_30_percent{
        width: 30%;
    }
    .width_25_percent{
        width: 25%;
    }
    .width_20_percent{
        width: 20%;
    }
    .width_15_percent{
        width: 15%;
    }
    .width_10_percent{
        width: 10%;
    }
    .width_5_percent{
        width: 5%;
    }



    .height_100_percent{
        height: 100%;
    }
    .height_95_percent{
        height: 95%;
    }
    .height_90_percent{
        height: 90%;
    }
    .height_25_percent{
        height: 25%;
    }



    .height_10_px{
        height: 10px;
    }
    .height_20_px{
        height: 20px;
    }
    .height_30_px{
        height: 30px;
    }
    .height_40_px{
        height: 40px;
    }








    .mosalas_left_bottom_redShine_40px:before{
        content: "";
        position: absolute;
        left: -42px;
        top: -2px;
        display: inline-block;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 0 42px 42px;
        border-color: transparent transparent #4e4d4c transparent;
    }
    .mosalas_left_bottom_redShine_40px:after{
        content: "";
        position: absolute;
        left: -40px;
        display: inline-block;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 0 40px 40px;
        border-color: transparent transparent #ff2b1f transparent;
    }




    .mosalas_left_bottom_redShine_30px:before{
        content: "";
        position: absolute;
        left: -32px;
        top: -2px;
        display: inline-block;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 0 32px 32px;
        border-color: transparent transparent #4e4d4c transparent;
    }
    .mosalas_left_bottom_redShine_30px:after{
        content: "";
        position: absolute;
        left: -29px;
        display: inline-block;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 0 30px 30px;
        border-color: transparent transparent #ff2b1f transparent;
    }



    .mosalas_left_bottom_redShine_20px:before{
        content: "";
        position: absolute;
        left: -28px;
        top: -2px;
        display: inline-block;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 0 29px 29px;
        border-color: transparent transparent #4e4d4c transparent;
    }
    .mosalas_left_bottom_redShine_20px:after{
        content: "";
        position: absolute;
        left: -24px;
        display: inline-block;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 0 25px 25px;
        border-color: transparent transparent #ff2b1f transparent;
    }







    .border_radius_1{
        border-radius: 2.5px;
    }
    .border_radius_2{
        border-radius: 5px;
    }
    .border_radius_3{
        border-radius: 15px;
    }
    .border_radius_4{
        border-radius: 20px;
    }
    .border_radius_5{
        border-radius: 25px;
    }



    .border_radius_full{
        border-radius: 100%;
    }








    .text_bold{
        font-weight: 700!important
    }


    .text_align_center{
        text-align: center;
    }
    .text_align_right{
        text-align: right;
    }
    .text_align_left{
        text-align: left;
    }
    .text_align_justify{
        text-align: justify;
    }





    .text_decoration_line_through{
        text-decoration: line-through;
    }

    .hide_text_full{
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }





    .margin_zero{
        margin: 0;
    }
    .margin_auto{
        margin: auto;
    }


    .margin_1{
        margin: 2.5px;
    }
    .margin_2{
        margin: 5px;
    }
    .margin_3{
        margin: 10px;
    }
    .margin_4{
        margin: 15px;
    }
    .margin_5{
        margin: 20px;
    }


    .margin_y_1{
        margin: 2.5px auto;
    }
    .margin_y_2{
        margin: 5px auto;
    }
    .margin_y_3{
        margin: 10px auto;
    }
    .margin_y_4{
        margin: 15px auto;
    }
    .margin_y-5{
        margin: 20px auto;
    }


    .margin_b_1{
        margin: 0 auto 2.5px auto;
    }
    .margin_b_2{
        margin: 0 auto 5px auto;
    }
    .margin_b_2{
        margin: 0 auto 10px auto;
    }
    .margin_b_2{
        margin: 0 auto 15px auto;
    }
    .margin_b_2{
        margin: 0 auto 20px auto;
    }







    .padding_zero{
        padding: 0;
    }


    .padding_1{
        padding: 2.5px;
    }
    .padding_2{
        padding: 5px;
    }
    .padding_3{
        padding: 10px;
    }
    .padding_4{
        padding: 15px;
    }
    .padding_5{
        padding: 20px;
    }


    .padding_x_1{
        padding: 2.5px 0;
    }
    .padding_x_2{
        padding: 5px 0;
    }
    .padding_x_3{
        padding: 10px 0;
    }



    .padding_b_1{
        padding-bottom: 2.5px;
    }
    .padding_b_2{
        padding-bottom: 5px;
    }
    .padding_b_3{
        padding-bottom: 10px;
    }



    .padding_y_1{
        padding: 0 2.5px;
    }
    .padding_y_2{
        padding: 0 5px;
    }
    .padding_y_3{
        padding: 0 10px;
    }










    .direction_ltr{
        direction: ltr;
    }
    .direction_rtl{
        direction: rtl;
    }





    .opacity_10_percent{
        opacity: 0.1;
    }
    .opacity_20_percent{
        opacity: 0.2;
    }
    .opacity_30_percent{
        opacity: 0.3;
    }
    .opacity_40_percent{
        opacity: 0.4;
    }
    .opacity_50_percent{
        opacity: 0.5;
    }
    .opacity_60_percent{
        opacity: 0.6;
    }
    .opacity_70_percent{
        opacity: 0.7;
    }
    .opacity_80_percent{
        opacity: 0.8;
    }
    .opacity_90_percent{
        opacity: 0.9;
    }




    .position_relative{
        position: relative;
    }
    .position_absolute{
        position: absolute;
    }
    .position_fixed{
        position: fixed;
    }





    .bottom_zero{
        bottom: 0;
    }
    .bottom_1{
        bottom: 2.5px;
    }
    .bottom_2{
        bottom: 5px;
    }


    .top_zero{
        top: 0;
    }
    .top_1{
        top: 2.5px;
    }
    .top_2{
        top: 5px;
    }


    .left_zero{
        left: 0;
    }
    .left_1{
        left: 2.5px;
    }
    .left_2{
        left: 5px;
    }


    .right_zero{
        right: 0;
    }
    .right_1{
        right: 2.5px;
    }
    .right_2{
        right: 5px;
    }






    .position_x_25_percent{
        top: 50%;
        left: 25%;
        transform: translate(-50% , -50%);
    }

    .position_center{
        top: 50%;
        left: 50%;
        transform: translate(-50% , -50%);
    }

    .position_x_75_percent{
        top: 50%;
        left: 75%;
        transform: translate(-50% , -50%);
    }











    .font_1 {
        font-size: 10pt;
    }

    .font_2 {
        font-size: 12pt;
    }

    .font_3 {
        font-size: 14pt;
    }

    .font_4 {
        font-size: 16pt;
    }

    .font_5 {
        font-size: 18pt;
    }

    .font_6 {
        font-size: 20pt;
    }





    .line_height_1{
        line-height: 10px;
    }
    .line_height_2{
        line-height: 20px;
    }
    .line_height_3{
        line-height: 30px;
    }
    .line_height_4{
        line-height: 40px;
    }
    .line_height_5{
        line-height: 50px;
    }






</style>

