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
            $table->decimal('sellPrice',8,2)->nullable();
            $table->string('sku');
            $table->enum('stockStatus',['instock','outofstock']);;
            $table->boolean('featured')->default(false);
            $table->unsignedInteger('quantity')->default(10);
            $table->string('img');
            $table->text('imgs')->nullable();
            $table->bigInteger('ctgId')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('ctgId')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('ctgName')->references('name')->on('categories')->onDelete('cascade');
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
