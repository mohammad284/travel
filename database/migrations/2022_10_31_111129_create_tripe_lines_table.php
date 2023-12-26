<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripeLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tripe_lines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('from');
            $table->unsignedBigInteger('to');
            $table->time('time');
            $table->integer('price');
            $table->integer('vip');
            $table->integer('total_sit');
            $table->integer('free_sit');
            $table->varchar('day'); // 1:satarday , 2:sunday , 2:monday,3:tuseday ,4:wednesday,5:Thursday,
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
        Schema::dropIfExists('tripe_lines');
    }
}
