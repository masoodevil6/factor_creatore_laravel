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
        Schema::create('OTPs', function (Blueprint $table) {
            $table->id();
            $table->string("token")->unique();
            $table->string("otp_code");
            $table->string("input_login")->comment("email or mobile inserted");
            $table->tinyInteger("type")->default(0)->comment("0=> mobile 1=>email");
            $table->tinyInteger("used")->default(0)->comment("0=>not used 1=>used");
            $table->tinyInteger("status")->default(0);
            $table->foreignId("user_id")->constrained("users");

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
        Schema::dropIfExists('OTPs');
    }
};
