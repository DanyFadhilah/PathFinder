<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelamar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('gender');
            $table->string('pekerjaan1');
            $table->string('tempatkerja1');
            $table->string('lamakerja1');
            $table->string('pekerjaan2');
            $table->string('tempatkerja2');
            $table->string('lamakerja2');
            $table->string('pendidikan');
            $table->string('fakultas');
            $table->double('ipk')->nullable;
            $table->string('alamat');
            $table->string('mingaji');
            $table->string('maxgaji');
            $table->timestamps();
        });

        // Schema::table('pelamar', function (Blueprint $table) {
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        //     $table->foreign('pekerjaan_id')->references('id')->on('pekerjaan')->onDelete('cascade')->onUpdate('cascade');
        //     $table->foreign('pendidikan_id')->references('id')->on('pendidikan')->onDelete('cascade')->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelamar');
    }
}
