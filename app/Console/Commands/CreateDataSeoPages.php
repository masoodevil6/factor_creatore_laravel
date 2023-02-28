<?php

namespace App\Console\Commands;

use App\Repositories\ContextRepository;
use Illuminate\Console\Command;

class CreateDataSeoPages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seo:pages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create data seo pages';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $settingRepository = ContextRepository::SeoPageRepository();

        $settingRepository->createItemSeoPageIfNotExist("home" , true );
        $settingRepository->createItemSeoPageIfNotExist("aboutUs" , true );
        $settingRepository->createItemSeoPageIfNotExist("downloadApps" , true );
        $settingRepository->createItemSeoPageIfNotExist("listSubscribes" , true );
        //------------------------------
        $settingRepository->createItemSeoPageIfNotExist("subscribe" , false );

        $this->info("if data not existed; created in seo pages");
        return Command::SUCCESS;
    }
}
