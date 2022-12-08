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
        Schema::create('perkara', function (Blueprint $table) {
            $table->id();
            $table->string('no_perkara', 50);
            $table->string('terdakwa', 100);
            $table->dateTime('tgl_sidang');
            $table->bigInteger('id_klasifikasi');
            $table->bigInteger('id_hakim');
            $table->bigInteger('id_ruang');
            $table->softDeletes();
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
        Schema::dropIfExists('perkara');
    }
};
