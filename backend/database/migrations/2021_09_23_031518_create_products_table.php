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
            $table->string('id',  10)->unique();
            $table->string('serial', 12);
            $table->string('name', 200);
            $table->string('slug', 200);
            $table->string('thumbnail', 200);
            $table->decimal('cost_price', $precision = 12, $scale = 2);
            $table->decimal('price', $precision = 12, $scale = 2);
            $table->text('excerpt')->nullable();
            $table->text('description')->nullable();
            $table->integer('stock')->default(0);
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
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
