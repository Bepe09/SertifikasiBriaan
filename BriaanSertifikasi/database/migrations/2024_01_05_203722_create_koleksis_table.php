<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koleksis', function (Blueprint $table) {
            $table->id('id_buku');
            $table->string('judul');
            $table->string('gambar');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->date('tahun_terbit');
            $table->integer('jumlah_tersedia');
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
        Schema::dropIfExists('koleksis');
    }
};
