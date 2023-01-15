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
        Schema::create('factors', function (Blueprint $table) {
            $table->id();

            $table->string("res_num");

            $table->string("store_name")->nullable();
            $table->string("store_phone")->nullable();
            $table->string("store_address")->nullable();

            $table->string("customer_name")->nullable();
            $table->string("customer_phone")->nullable();
            $table->string("customer_address")->nullable();

            $table->string("logo_name")->nullable();

            $table->foreignId("form_id")->nullable()->constrained("forms")->onUpdate("cascade")->onDelete("cascade");
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
        Schema::dropIfExists('factors');
    }
};
