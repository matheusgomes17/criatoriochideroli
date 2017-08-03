<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('catalog.orders_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('manager_id')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();

            /**
             * Add Foreign/Unique/Index
             */
            $table->foreign('user_id')->references('id')->on(config('access.users_table'))->onDelete('cascade');
            $table->foreign('manager_id')->references('id')->on(config('access.users_table'))->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('catalog.orders_table'));
    }
}
