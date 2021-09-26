<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWareHouseReciptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ware_house_recipts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->decimal('total_price', $precision = 12, $scale = 2);
            $table->tinyInteger('type');
            $table->text('remark')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('partner_id');
            $table->unsignedBigInteger('warehouse_id');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('partner_id')->references('id')->on('partners')->onDelete('cascade');
            $table->foreign('warehouse_id')->references('id')->on('ware_houses')->onDelete('cascade');
            $table->date('create_date');
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
        Schema::dropIfExists('ware_house_recipts');
    }
}
