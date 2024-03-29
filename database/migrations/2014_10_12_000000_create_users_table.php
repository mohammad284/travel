<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('type');
            $table->integer('status');
            $table->string('main_address')->nullable();
            $table->string('image')->nullable();
            $table->integer('gender');
            $table->integer('age');
            $table->text('bio')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
