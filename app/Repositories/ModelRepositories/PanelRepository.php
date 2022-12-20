<?php
namespace App\Repositories\ModelRepositories;

use App\Models\Panel\Panel;
use App\Repositories\InterFaceRepositories\IPanelRepository;

class PanelRepository extends BaseRepository implements IPanelRepository {

    public function __construct()
    {
        parent::__construct(new Panel());
    }

    function getPanelGroupAndLink(int $panelGroupId, string $link)
    {
        return $this->model->where("panel_group_id" , $panelGroupId)->where("link" , $link)->first();
    }

    function deleteAllRecord() : void
    {
        $this->model->query()->delete();
    }
}