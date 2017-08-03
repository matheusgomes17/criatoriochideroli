<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('catalog.products_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('category_main_id')->nullable();
            $table->string('name', 191);
            $table->string('slug', 191);
            $table->string('code', 50);
            $table->string('height', 10);
            $table->string('color', 20)->nullable();
            $table->string('weight', 10)->nullable();
            $table->date('birthday');
            $table->text('description');
            $table->boolean('sold')->default(false);
            $table->tinyInteger('status')->default(1)->unsigned();
            $table->softDeletes();
            $table->timestamps();

            /**
             * Add Foreign/Unique/Index
             */
            $table->foreign('user_id')->references('id')->on(config('access.users_table'))->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on(config('catalog.categories_table'))->onDelete('cascade');
            $table->index(['user_id', 'category_id', 'category_main_id']);
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('catalog.products_table'));
    }
}
