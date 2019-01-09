<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id');

            $table->date('order_date');
            $table->string('delivery_day');
            $table->string('frecuency');
            $table->integer('total');

            // FK
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('statuses');

            // FK
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // FK
            $table->integer('fish_box_id')->unsigned();
            $table->foreign('fish_box_id')->references('id')->on('fish_boxes');

            $table->softDeletes();
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
        Schema::dropIfExists('subscriptions');
    }
}
