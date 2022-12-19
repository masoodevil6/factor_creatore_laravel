<?php
namespace App\Repositories\ModelRepositories;

use App\Models\Panel\PanelGroup;
use App\Repositories\InterFaceRepositories\IPanelGroupRepository;

class PanelGroupRepository extends BaseRepository implements IPanelGroupRepository {

    public function __construct()
    {
        parent::__construct(new PanelGroup());
    }




}