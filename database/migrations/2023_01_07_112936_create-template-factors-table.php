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
        Schema::create('template_factors', function (Blueprint $table) {
            $table->id();

            $table->string("res_num");
            $table->text("description")->nullable();

            $table->string("store_name")->default("");
            $table->string("store_phone")->default("");
            $table->string("store_address")->default("");

            $table->string("customer_name")->default("");
            $table->string("customer_phone")->default("");
            $table->string("customer_address")->default("");

            $table->string("file_name")->default("");
            $table->string("logo_name")->default("");
            $table->string("mohr_name")->nullable();

            $table->foreignId("form_id")->nullable()->constrained("forms");
            $table->foreignId("user_id")->nullable()->constrained("users")->onUpdate("cascade")->onDelete("cascade");

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
        Schema::dropIfExists('template_factors');
    }
};
