<?php
namespace App\Repositories\ModelRepositories\Users;

use App\Models\Publics\Setting;
use App\Repositories\InterFaceRepositories\Users\ISettingRepository;
use App\Repositories\ModelRepositories\BaseRepository;

class SettingRepository extends BaseRepository implements ISettingRepository {

    public function __construct()
    {
        parent::__construct(new Setting());
    }


    function createItemSettingIfNotExist(string  $titleEn , string $titleFa , string $value): void
    {
        if (empty($this->model->where("titleEn" , $titleEn)->first())){

            $data = [
                "titleEn" => $titleEn,
                "titleFa" => $titleFa,
                "value" => $value,
            ];

            $this->addResult($data);
        }
    }
}