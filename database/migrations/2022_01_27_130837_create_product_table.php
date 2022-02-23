<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments("product_id");
            $table->integer("category_id");
            $table->integer("manufacture_id");
            $table->string("product_name");
            $table->string("product_description");
            $table->float("product_price");
            $table->string("product_size");
            $table->string("product_color");
            $table->string("product_image");
            $table->string("product_status")->nullable();
            $table->string("product_recomend")->nullable();
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
        Schema::dropIfExists('product');
    }
}
