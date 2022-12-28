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
        Schema::create('subscribe_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId('subscribe_id')->constrained("subscribes")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId('bank_id')->nullable()->constrained("banks")->onUpdate("cascade")->onDelete("cascade");
            $table->string("res_num")->nullable();
            $table->string("ref_num")->nullable();
            $table->integer("amount")->nullable();
            $table->string("phone")->nullable();
            $table->string("email")->nullable();
            $table->tinyInteger('status')->default(0)->comment("0=>not pay , 1=> pay");
            $table->tinyInteger('admin_add')->default(0)->comment("0=>not admin add , 1=> admin add");
            $table->timestamp("time_set")->useCurrent();
            $table->timestamps();
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
        Schema::dropIfExists('subscribe_payments');
    }
};
