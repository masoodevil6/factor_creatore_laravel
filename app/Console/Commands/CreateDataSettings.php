<?php

namespace App\Console\Commands;

use App\Repositories\ContextRepository;
use Illuminate\Console\Command;

class CreateDataSettings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setting:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create data settings';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $settingRepository = ContextRepository::SettingRepository();

        $settingRepository->createItemSettingIfNotExist("site_name" , "عنوان سایت" , "فاکتور ساز");
        $settingRepository->createItemSettingIfNotExist("site_name_en" , "عنوان انگلیسی" , "FactorSize");

        $settingRepository->createItemSettingIfNotExist("address" , "آدرس" , "");
        $settingRepository->createItemSettingIfNotExist("site_email" , "ایمیل سایت" , "");
        $settingRepository->createItemSettingIfNotExist("site_phone" , "تلفن سایت" , "");

        $settingRepository->createItemSettingIfNotExist("telegram" , "کانال تلگرام" , "");
        $settingRepository->createItemSettingIfNotExist("instagram" , "کانال اینستاگرام" , "");
        $settingRepository->createItemSettingIfNotExist("twitter" , "کانال تویتر" , "");
        $settingRepository->createItemSettingIfNotExist("facebook" , "کانال فیسبوک" , "");

        $settingRepository->createItemSettingIfNotExist("about_us" , "درباره ما" , "");

        $this->info("if data not existed; created in settings");
        return Command::SUCCESS;
    }
}
