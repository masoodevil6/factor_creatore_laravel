<?php
namespace Database\Seeders;

use Database\Seeders\PanelTools\PanelAdmin;
use Illuminate\Database\Seeder;

class CreatePanelMainAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $panelAdmin = new PanelAdmin();
        $panelAdmin->createMainAdminPanel();
    }
}