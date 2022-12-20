<?php
namespace Database\Seeders;


use App\Repositories\ContextRepository;

use Database\Seeders\PanelGroups\AdminGroup\CreatePanelGroupAdminSeeder;
use Database\Seeders\PanelGroups\AdminGroup\CreatePanelPanelsInPanelGroupAdminSeeder;
use Database\Seeders\PanelGroups\AdminGroup\CreatePanelUserAdminInPanelGroupAdminSeeder;
use Database\Seeders\PanelGroups\PublicGroup\CreatePanelGroupPublicSeeder;
use Database\Seeders\PanelGroups\PublicGroup\CreatePanelSettingSitePanelGroupPublicSeeder;
use Illuminate\Database\Seeder;

class PanelsAdminSeeder extends Seeder
{

    public function run()
    {

        ContextRepository::PanelGroupRepository()->deleteAllRecord();
        ContextRepository::PanelRepository()->deleteAllRecord();


        /// admin ToolsPanel
        $this->call(CreatePanelGroupAdminSeeder::class);
        $this->call(CreatePanelPanelsInPanelGroupAdminSeeder::class);
        $this->call(CreatePanelUserAdminInPanelGroupAdminSeeder::class);

        /// public ToolsPanel
        $this->call(CreatePanelGroupPublicSeeder::class);
        $this->call(CreatePanelSettingSitePanelGroupPublicSeeder::class);
        $this->call(InsertIntoSettingSite::class);

    }


}