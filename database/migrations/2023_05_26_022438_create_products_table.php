<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name')->unique();
            $table->string('ctg')->unique();
            $table->string('shortDesc')->nullable();
            $table->text('description')->nullable();
            $table->decimal('oriPrice',8,2);
            $table->enum('stockStatus',['instock','outofstock']);
            $table->unsignedInteger('quantity')->default(10);
            $table->string('img');
            $table->text('imgs')->nullable();
            $table->bigInteger('ctgId')->unsigned()->nullable();
            $table->foreign('ctgId')->references('id')->on('categories')->onDelete('cascade');
            $table->bigInteger('subcId')->unsigned()->nullable();
            $table->foreign('subcId')->references('id')->on('subcategories')->onDelete('cascade');
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
};
