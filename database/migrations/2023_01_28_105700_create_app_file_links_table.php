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
        Schema::create('app_file_links', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("image")->nullable();
            $table->text("address")->nullable();
            $table->foreignId('app_file_id')->nullable()->constrained("app_files")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId('app_category_id')->constrained("app_categories")->onUpdate("cascade")->onDelete("cascade");
            $table->tinyInteger('status')->default(1)->comment("0=>disable , 1=> enable");
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
        Schema::dropIfExists('app_file_links');
    }
};
