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
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->id('id_peminjaman');
            $table->unsignedBigInteger('id_buku')->unsigned();
            $table->unsignedBigInteger('id_anggota')->unsigned();
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian');
            $table->string('status_pengembalian');
            $table->timestamps();

            $table->foreign('id_buku')->references('id_buku')->on('koleksi')->onDelete('SET NULL');
            $table->foreign('id_anggota')->references('id_anggota')->on('anggota')->onDelete('SET NULL');
        });

        // Schema::table('peminjamen', function($table){
        //     $table->foreign('id_buku')->references('id_buku')->on('koleksi')->onDelete('SET NULL');
        //     $table->foreign('id_anggota')->references('id_anggota')->on('anggota')->onDelete('SET NULL');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjamen');
    }
};
