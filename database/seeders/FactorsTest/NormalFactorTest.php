<?php
namespace Database\Seeders\FactorsTest;

use Database\Seeders\PanelTools\PanelAdmin;
use Illuminate\Database\Seeder;

class NormalFactorTest extends BaseFactorTest
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->setClassName("App\Http\Services\Forms\Forms\NormalForm");
        $this->generateFileFactor();
    }
}