<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('system.contacts_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('name', 191);
            $table->string('email', 191);
            $table->string('phone', 9)->nullable();
            $table->string('subject', 191);
            $table->text('message');
            $table->tinyInteger('status')->default(1)->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on(config('access.users_table'))->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('system.contacts_table'));
    }
}
