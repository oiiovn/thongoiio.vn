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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('worker_id')->nullable();
            $table->string('code')->unique();
            $table->string('name')->nullable();
            $table->string('slug')->unique();
            $table->double('money');
            $table->double('money_product')->default(0);
            $table->double('money_product_addition')->default(0);
            $table->tinyInteger('status');
            $table->tinyInteger('is_virtual')->default(false);
            $table->text('note')->nullable();
            $table->text('desc')->nullable();
            $table->timestamp('receive_at')->nullable();
            $table->timestamp('step_at')->nullable();
            $table->timestamps();
            $table->foreign('shop_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
};
