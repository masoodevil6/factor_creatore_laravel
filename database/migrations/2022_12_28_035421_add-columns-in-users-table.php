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
        Schema::table('users', function (Blueprint $table) {
            $table->string('mobile')->unique()->nullable();
            $table->text('profile_photo_path')->nullable()->comment("avatar");
            $table->tinyInteger('activation')->default(0)->comment("0=>disable , 1=>enable , for register client ");
            $table->timestamp('activation_time')->nullable();
            $table->tinyInteger('status')->default(0)->comment("0=>disable , 1=> enable , for disable client for site");
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->removeColumn("mobile");
            $table->removeColumn("profile_photo_path");
            $table->removeColumn("activation");
            $table->removeColumn("activation_time");
            $table->removeColumn("status");
            $table->removeColumn("deleted_at");
        });
    }
};
