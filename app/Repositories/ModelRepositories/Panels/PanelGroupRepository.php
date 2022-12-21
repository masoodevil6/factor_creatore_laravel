<?php
namespace App\Repositories\ModelRepositories\Panels;

use App\Models\Panel\PanelGroup;
use App\Repositories\InterFaceRepositories\Panels\IPanelGroupRepository;
use App\Repositories\ModelRepositories\BaseRepository;

class PanelGroupRepository extends BaseRepository implements IPanelGroupRepository {

    public function __construct()
    {
        parent::__construct(new PanelGroup());
    }


    function getPanelGroupWithTitle(string $title)
    {
        return $this->model->where("title_en" , $title)->first();
    }

    function deleteAllRecord(): void
    {
        $this->model->query()->delete();
    }
}