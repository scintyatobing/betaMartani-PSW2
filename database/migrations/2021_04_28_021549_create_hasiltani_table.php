<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasiltaniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasiltani', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('nama_hasiltani');
            $table->longtext('deskripsi');
            $table->double('harga');
            $table->date('tgl_masuk');
            $table->integer('stok');
            $table->string('gambar');
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
        Schema::dropIfExists('hasiltani');
    }
}
