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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('slug');

            $table->string('reference')->unique()->nullable();
            $table->text('description')->nullable();

            $table->boolean('availability')->default(1);
            $table->enum('state', ['neuf', 'remis à neuf', 'reparation']);
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('surface')->nullable();


            $table->unsignedInteger('brand_id')
                  ->foreign('brand_id')
                  ->references('id')
                  ->on('brands');

            $table->unsignedInteger('category_id')
                  ->foreign('category_id')
                  ->references('id')
                  ->on('categories');
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
        Schema::dropIfExists('products');
    }
}
