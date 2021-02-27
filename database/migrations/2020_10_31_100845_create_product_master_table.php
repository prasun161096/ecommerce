<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_master', function (Blueprint $table) {
            $table->id();
            $table->string('product_title');
            $table->longText('product_desc');
            $table->integer('product_brand_id');
            $table->integer('product_cat_id');
            $table->decimal('product_mrp_price',8,2);
            $table->decimal('product_sell_price',8,2);
            $table->string('product_img_url')->nullable();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('product_master');
    }
}
