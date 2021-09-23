<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCostVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cost_vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('receiver', 100);
            $table->string('description', 200);
            $table->decimal('total_price', $precision = 12, $scale = 2);
            $table->tinyInteger('type');
            $table->date('created_date');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('partner_id');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('partner_id')->references('id')->on('partners')->onDelete('cascade');
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
        Schema::dropIfExists('cost_vouchers');
    }
}
