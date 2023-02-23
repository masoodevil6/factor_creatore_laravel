<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Services\Login\VerifyInput;
use App\Repositories\ContextRepository;
use Illuminate\Http\Request;

class UserPersonApiController extends Controller
{
    /* [POST]
     * ====================================
     *  url=> /user/person/full-name
     *====================================
     *  SEND: NULL
     * ====================================
     *  RETURN: String[full-name]
     */

    public function getFullNameClient(){
        $data = ContextRepository::UserRepository()->GetUserAuthInfo();
        return $data["fullName"];
    }





    /* [POST]
     * ====================================
     *  url=> /user/person/info
     *====================================
     *  SEND: NULL
     * ====================================
     *  RETURN: ["name" , "family" , "email" , "phone"]]
     */

    public function getInfoClient(){
        $data = ContextRepository::UserRepository()->GetUserAuthInfo();
        return [
            "name" => $data["name"],
            "family" => $data["family"],
            "email" => $data["email"],
            "mobile" => $data["mobile"],
        ];
    }


    /* [POST]
     * ====================================
     *  url=> /user/person/set
     *====================================
     *  SEND: OBJECT["name" , "family"]
     * ====================================
     *  RETURN: String[msg]
     */
    public function setUserInfo(Request $request){

        $name = $request-> name;
        $family = $request-> family;

        if ( ContextRepository::UserRepository()->UpdateUserInfo($name , $family)){
            return "اطلاعات با موفقیت ویرایش شد";
        }

        return "مشکلی در پردازش اطلاعات رخ داده است" ;

    }



    /* [POST]
     * ====================================
     *  url=> /user/person/send-code-verify-phone
     *====================================
     *  SEND: param[input]
     * ====================================
     *  RETURN: String[token]
     */
    public function sendCodeVerifyPhone(Request $request){
        if ( $request->has("input")){
            $input = $request->get("input");
            $myInfo = checkPhoneGet($input);

            if ($myInfo != ""){
                return $this->sendOtpTokenClient($myInfo , ContextRepository::OtpRepository()->getTypeOtp("phone"));
            }
            else{
                return response("" , 404);
            }
        }
        return "";
    }



    /* [POST]
       * ====================================
       *  url=> /user/person/send-code-verify-email
       *====================================
       *  SEND: param[input]
       * ====================================
       *  RETURN: String[token]
       */
    public function sendCodeVerifyEmail(Request $request){
        if ( $request->has("input")){
            $input = $request->get("input");
            $myInfo = checkEmailGet($input);

            if ($myInfo != ""){
                return $this->sendOtpTokenClient($myInfo , ContextRepository::OtpRepository()->getTypeOtp("email"));
            }
            else{
                return response("" , 404);
            }
        }
        return "";
    }



    /* [POST]
       * ====================================
       *  url=> /user/person/verify-code
       *====================================
       *  SEND: param[token] , param[code]
       * ====================================
       *  RETURN: String[msg]
       */
    public function verifyCode(Request $request){

        if ( $request->has("token") && $request->has("code")){
            $token = $request->get("token");
            $code = $request->get("code");
            $verify = new  VerifyInput();

            if ($verify->verifyCodeGet($token , $code)){
                return "درخواست با موفقیت تایید شد";
            }
        }

        return "مشکلی در پردازش درخواست شما رخ داده است";
    }





    /////==============================================
    protected function sendOtpTokenClient( $inputLogin , $type ){
        $verify = new  VerifyInput();
        return $verify->sendOtpTokenVerify($inputLogin , $type);
    }

}
