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
        Schema::create('seo_meta_seo_robot', function (Blueprint $table) {
            $table->id();
            $table->foreignId("seo_robot_id")->constrained("seo_robots")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("seo_meta_id")->constrained("seo_metas")->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_meta_seo_robot');
    }
};
