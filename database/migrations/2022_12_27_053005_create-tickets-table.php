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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->text("text");
            $table->foreignId("ticket_folder_id")->constrained("ticket_folders")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId('admin_id')->nullable()->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->tinyInteger('seen')->default(0)->comment("0=>not seen , 1=> seen");
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
        Schema::dropIfExists('tickets');
    }
};
