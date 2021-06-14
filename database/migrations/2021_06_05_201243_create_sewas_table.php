<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSewasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sewas', function (Blueprint $table) {
            $table->id('id_sewa');
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');
            $table->text('deskripsi')->nullable();
            $table->integer('durasi');
            $table->integer('total_harga');
            $table->string('status_sewa');
            $table->text('img_sewa');
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
        Schema::dropIfExists('sewas');
    }
}
