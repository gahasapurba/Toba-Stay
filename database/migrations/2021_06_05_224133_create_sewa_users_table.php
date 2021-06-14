<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSewaUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sewa_users', function (Blueprint $table) {
            $table->id();
            $table->integer('id_sewa');
            $table->integer('id_user');
            $table->timestamps();

            $table->index('id_sewa');
            $table->foreign('id')->references('id_sewa')->on('sewas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sewa_users');
    }
}
