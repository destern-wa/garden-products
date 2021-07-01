<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string("name", 64);
            $table->string("description")->nullable();
            $table->string("slug", 72);
            $table->decimal("price", 6, 2, true);
            $table->string("pricing_unit", 16)->nullable();
            $table->bigInteger("category_id")->unsigned();
            $table->string("picture")->nullable();
            $table->boolean("available")->default(true);
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
