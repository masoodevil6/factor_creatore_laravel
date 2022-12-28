<?php
namespace App\Repositories\ModelRepositories\Subscribes;

use App\Models\Subscribes\SubscribePayment;
use App\Repositories\ContextRepository;
use App\Repositories\InterFaceRepositories\Subscribes\ISubscribePaymentRepository;
use App\Repositories\ModelRepositories\BaseRepository;

class SubscribePaymentRepository extends BaseRepository implements ISubscribePaymentRepository {

    public function __construct()
    {
        parent::__construct(new SubscribePayment());
    }


    function CreateRecordForUser(string $userEmail , array $data) : int
    {
        $user = ContextRepository::UserRepository()->GetUserWithEmail($userEmail);

        if (!empty($user)) {
            $data["user_id"] = $user->id;
            $data["email"] = $userEmail;

            $subscribePayment = $this->addResult($data);

            return $subscribePayment->id;
        }

        return 0;
    }
}