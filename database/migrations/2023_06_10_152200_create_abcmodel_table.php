<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbcmodelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abcmodel', function (Blueprint $table) {
            $table->id();
            $table->string('pemakaian_id',100);
            $table->string('hasil',100);
            $table->string('presentase',100);
            $table->string('kategori',100);
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
        Schema::dropIfExists('abcmodel');
    }
}
