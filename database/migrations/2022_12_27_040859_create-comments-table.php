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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text("body");
            $table->foreignId("parent_id")->nullable()->constrained("comments")->onUpdate("cascade")->onDelete("cascade");
            $table->foreignId("user_id")->nullable()->constrained("users")->onUpdate("cascade")->onDelete("cascade");
            $table->tinyInteger("seen")->default(0);
            $table->tinyInteger("approved")->default(0)->comment("0:not active , 1:active ; from admin");
            $table->tinyInteger("status")->default(0);
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
        Schema::dropIfExists('comments');
    }
};
