<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkomodasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akomodasis', function (Blueprint $table) {
            $table->id('id_akomodasi');
            $table->string('nama_akomodasi');       
            $table->string('jenis_akomodasi');
            $table->string('kecamatan');
            $table->string('alamat');
            $table->string('deskripsi_akomodasi');
            $table->text('fasilitas')->nullable();
            $table->integer('harga_hari')->nullable();
            $table->integer('harga_bulan')->nullable();
            $table->string('status_akomodasi')->default('not_ver');
            $table->integer('stok');
            $table->string('ukuran');
            $table->string('img_akomodasi');
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
        Schema::dropIfExists('akomodasis');
    }
}
