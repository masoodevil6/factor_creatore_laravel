<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('template_factors', function (Blueprint $table) {
            $table->tinyInteger("type_logo")->default(0);
            $table->tinyInteger("type_mohr")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('template_factors', function (Blueprint $table) {
            $table->removeColumn("type_logo");
            $table->removeColumn("type_mohr");
        });
    }
};
