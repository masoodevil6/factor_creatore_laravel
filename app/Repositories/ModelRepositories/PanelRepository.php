<?php
namespace App\Repositories\ModelRepositories;

use App\Models\Panel\AdminUser;
use App\Models\Panel\Panel;
use App\Repositories\InterFaceRepositories\IPanelRepository;

class PanelRepository extends BaseRepository implements IPanelRepository {

    public function __construct()
    {
        parent::__construct(new Panel());
    }




}