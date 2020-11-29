<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('photo');
            $table->string('color_attribute_id');     /* color attribute */
            $table->string('size_attribute_id');      /* size attribute */
            $table->string('quantity');
            $table->string('price');        /* seller price */
            $table->string('cost');         /* buyer price */
            $table->string('extra')->nullable();        /* buyer extra price */
            $table->string('description');
            $table->enum('status', ['On', 'Off'])->default('On');
            $table->date('arrived', 0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attributes');
    }
}