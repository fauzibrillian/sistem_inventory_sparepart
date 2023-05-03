<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSparepartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sparepart', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sparepart',100);
            $table->string('kode_sparepart',100);
            $table->string('harga',100);
            $table->string('merk',100);
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
        Schema::dropIfExists('sparepart');
    }
}
