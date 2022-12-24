<?php
namespace Database\Seeders;


use App\Repositories\ContextRepository;

use Database\Seeders\PanelGroups\AdminGroup\CreatePanelGroupAdminSeeder;
use Database\Seeders\PanelGroups\AdminGroup\CreatePanelPanelsInPanelGroupAdminSeeder;
use Database\Seeders\PanelGroups\AdminGroup\CreatePanelUserAdminInPanelGroupAdminSeeder;
use Database\Seeders\PanelGroups\FactorGroup\CreatePanelFactorsInPanelGroupFactorSeeder;
use Database\Seeders\PanelGroups\FactorGroup\CreatePanelGroupFactorSeeder;
use Database\Seeders\PanelGroups\FormGroup\CreatePanelFormCategoryPanelGroupFormSeeder;
use Database\Seeders\PanelGroups\FormGroup\CreatePanelFormPanelGroupFormSeeder;
use Database\Seeders\PanelGroups\FormGroup\CreatePanelGroupFormSeeder;
use Database\Seeders\PanelGroups\PublicGroup\CreatePanelGroupPublicSeeder;
use Database\Seeders\PanelGroups\PublicGroup\CreatePanelSettingSitePanelGroupPublicSeeder;
use Database\Seeders\PanelGroups\PublicGroup\CreatePanelUnitGroupPublicSeeder;
use Database\Seeders\PanelGroups\UserGroup\CreatePanelGroupUserSeeder;
use Database\Seeders\PanelGroups\UserGroup\CreatePanelUserPanelGroupUserSeeder;
use Database\Seeders\PanelGroups\UserGroup\CreatePanelUserStorePanelGroupUserSeeder;
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
        $this->call(CreatePanelUnitGroupPublicSeeder::class);

        /// Form ToolsPanel
        $this->call(CreatePanelGroupFormSeeder::class);
        $this->call(CreatePanelFormCategoryPanelGroupFormSeeder::class);
        $this->call(CreatePanelFormPanelGroupFormSeeder::class);

        /// factor ToolsPanel
        $this->call(CreatePanelGroupFactorSeeder::class);
        $this->call(CreatePanelFactorsInPanelGroupFactorSeeder::class);

        /// user ToolsPanel
        $this->call(CreatePanelGroupUserSeeder::class);
        $this->call(CreatePanelUserPanelGroupUserSeeder::class);
        $this->call(CreatePanelUserStorePanelGroupUserSeeder::class);


        $this->call(InsertIntoSettingSite::class);

    }


}