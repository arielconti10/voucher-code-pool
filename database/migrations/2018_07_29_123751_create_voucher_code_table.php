<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoucherCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->integer('recipient_id')->nullable();
            $table->integer('special_offer_id')->nullable();
            $table->date('expiration_date')->nullable();
            $table->date('usage_date')->nullable();

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
        Schema::dropIfExists('voucher_codes');
    }
}
