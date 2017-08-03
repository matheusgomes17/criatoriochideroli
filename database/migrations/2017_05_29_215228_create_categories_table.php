<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('catalog.categories_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedInteger('_lft');
            $table->unsignedInteger('_rgt');
            $table->string('name', 191);
            $table->string('slug', 191);
            $table->text('description');
            $table->softDeletes();
            $table->timestamps();
            
            /**
             * Add Foreign/Unique/Index
             */
            $table->foreign('user_id')->references('id')->on(config('access.users_table'))->onDelete('cascade');
            $table->index(['parent_id', '_lft', '_rgt']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('catalog.categories_table'));
    }
}
