<?php
namespace Database\Seeders;

use Database\Seeders\PanelTools\PanelAdmin;
use Illuminate\Database\Seeder;

class CreateUserMainAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email = $this->command->ask('Please enter the email main admin for creating access!!');
        $passwordAdmin = $this->command->ask('Please enter the Passwrod main admin for login Admin!!');

        $panelAdmin = new PanelAdmin();
        $panelAdmin ->setMainAdmin($email , $passwordAdmin);
    }
}