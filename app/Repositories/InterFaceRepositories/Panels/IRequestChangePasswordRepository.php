<?php
namespace App\Repositories\InterFaceRepositories\Panels;

use App\Repositories\InterFaceRepositories\IBaseRepository;

interface IRequestChangePasswordRepository extends IBaseRepository {

    function CheckExistLastRequest($userEmail);

    function CreateRequestToken($userEmail , $password);

    function CheckValidRequestToken(string $token);


}