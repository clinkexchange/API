<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('tran_id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('type');
            $table->float('amount');
            $table->integer('dwp_from_id')->unsigned()->nullable();
            $table->integer('dwp_to_id')->unsigned()->nullable();
            $table->string('ce_from')->nullable();
            $table->string('ce_to')->nullable();
            $table->float('ce_total_amount')->nullable();
            $table->double('ce_exchangerate_value', 15, 4)->nullable();
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
        Schema::drop('transactions');
    }
}
