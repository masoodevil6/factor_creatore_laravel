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
        Schema::create('admin_panel', function (Blueprint $table) {
            $table->id();
            $table->foreignId("panel_id")->constrained("panels")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("admin_id")->constrained("admins")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_panel');
    }
};
