<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->bigInteger('no_agenda');
            $table->bigInteger('no_surat');
            $table->string('slug');
            $table->string('asal_surat');
            $table->string('perihal');
            $table->date('tanggal_surat');
            $table->boolean('jenis_surat');
            $table->date('tanggal_diterima');
            $table->text('keterangan');
            $table->string('status');
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
        Schema::dropIfExists('files');
    }
}
