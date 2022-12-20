<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $inputPassword = $this->command->ask('Please enter password For Create data site!!');

        ///@masoodevil6
        if (Hash::check($inputPassword , '$2y$10$ip.KBMgcNg3WtRDlyJwRDuhzfcN352leRd.KHb8PUOY30r.C1Csb6')){

            /// creat panel Main Admin
            $this->call(CreatePanelMainAdminSeeder::class);

            /// create panels admin
            $this->call(PanelsAdminSeeder::class);

            /// choose user Main Admin
            $this->call(CreateUserMainAdminSeeder::class);

            /// insert data site in setting table
            $this->call(InsertIntoSettingSite::class);
        }
    }
}
