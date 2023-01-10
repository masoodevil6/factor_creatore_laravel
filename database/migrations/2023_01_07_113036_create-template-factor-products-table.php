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
        Schema::create('template_factor_products', function (Blueprint $table) {
            $table->id();

            $table->string("name")->nullable();
            $table->float("num")->default(1.0);
            $table->string("unit")->nullable();
            $table->bigInteger("off")->nullable();
            $table->bigInteger("price")->nullable();

            $table->foreignId("template_factor_id")->constrained("template_factors")->onUpdate("cascade")->onDelete("cascade");

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
        Schema::dropIfExists('template_factor_products');
    }
};
