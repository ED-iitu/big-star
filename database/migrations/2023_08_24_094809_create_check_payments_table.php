<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('pocket_id');
            $table->integer('price');
            $table->string('currency');
            $table->integer('registered_from');
            $table->integer('presenter');
            $table->text('check');
            $table->integer('status');
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
        Schema::dropIfExists('check_payments');
    }
}
