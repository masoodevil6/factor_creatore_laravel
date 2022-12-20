<?php
namespace Database\Seeders;

use App\Repositories\ContextRepository;
use Illuminate\Database\Seeder;

class InsertIntoSettingSite extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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
    }

}