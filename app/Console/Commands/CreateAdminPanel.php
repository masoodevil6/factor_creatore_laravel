<?php

namespace App\Console\Commands;

use App\Repositories\ContextRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\Uid\Factory\getNamespace;

class CreateAdminPanel extends BasePanelCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description create panel admin';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /*$result = $this->CheckloginClient();
        if ($result == Command::SUCCESS){

            if ($this->checkLogin){
                $this->info("is true");
            }
            else{
                $this->info("is false");
            }

        }
        else{
            $this->info("invalid login user");
            return $result;
        }*/








        //$user = $this->ask('Please enter the email client');

        //$email = $this->ask('Please enter the email main admin for creating access!!');

        //$this->info(ContextRepository::UserRepository()->getResult($this->argument('user')));

        //return Command::SUCCESS;
    }
}
