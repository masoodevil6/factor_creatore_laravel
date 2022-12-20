<?php
namespace App\Repositories\ModelRepositories;

use App\Models\Publics\Setting;
use App\Repositories\InterFaceRepositories\ISettingRepository;

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