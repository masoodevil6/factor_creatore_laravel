<?php

namespace App\Console\Commands;

use App\Repositories\ContextRepository;
use Illuminate\Console\Command;

class CreateDataSeoRobots extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seo:robots';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create data seo robots';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $settingRepository = ContextRepository::SeoRobotRepository();

        $settingRepository->createItemSeoRobotIfNotExist("index" , "به موتور های جستجو اعلام میکند که آن صفحه را ایندکس کند _ پیش فرض" );
        $settingRepository->createItemSeoRobotIfNotExist("noindex" , "به موتورهای جستجو اعلام میکند که آن صفحه را ایندکس نکنند" );
        $settingRepository->createItemSeoRobotIfNotExist("follow" , "با این دستور، موتور های جستجو حتی صفحاتی که ایندکس نمی شوند را بررسی میکند و لینک های داخلی آن را دنبال می کند، همچنین با این کار اعتبار صفحه به لینک های داخلی آن نیز داده میشود");
        $settingRepository->createItemSeoRobotIfNotExist("nofollow" , "به موتور های جستجو اعلام میکند که هیچ لینکی را دنبال نکرده و اعتباری به آن منتقل نکند" );
        $settingRepository->createItemSeoRobotIfNotExist("noinageindex" , "این پارامتر به ربات های پایشگر اعلام می کند که عکس های صفحه را ایندکس نکنند" );
        $settingRepository->createItemSeoRobotIfNotExist("none" , "معادل استفاده همزمان از noindex و nofollow است" );
        $settingRepository->createItemSeoRobotIfNotExist("noarchive" , "این پارامتر موتورهای جستجو لینک کش صفحه را در SERF - صفحه نتایج گوگل - نشان نمی دهد" );
        $settingRepository->createItemSeoRobotIfNotExist("nocache" , "همانند noarchive اما توس اینترنت اکسپلور و فایرفاکس استفاده می شود " );
        $settingRepository->createItemSeoRobotIfNotExist("nosnippet" , "این پارامتر به موتورهای جستجو اعلام میکند که اسنیپیت های صفحه - مانند متاتگ توضیحات - را در صفحه نمایش جستجو نشان ندهد" );
        $settingRepository->createItemSeoRobotIfNotExist("Noodyp/noydir" , "این پارامتر منسوخ شده است. برای عدم نمایش توضیحات سایت DMOZ در صفحه نتایج جستجو مورد استفاده قرار می گرفت" );
        $settingRepository->createItemSeoRobotIfNotExist("Unavailable_after" , "این پارامتر به ربات های جستجو اعلام می کند که یک تاریخ مشخص به بعد نباید آن صفحه را ایندکس کنند" );

        $this->info("if data not existed; created in seo robots");
        return Command::SUCCESS;
    }
}
