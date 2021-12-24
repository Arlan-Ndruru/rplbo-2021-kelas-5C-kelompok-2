<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->string('no_surat')->unique();
            $table->string('slug')->unique();
            $table->string('judul_surat');
            $table->foreignId('asal_surat');
            $table->string('perihal');
            $table->date('tanggal_surat');
            $table->boolean('jenis_surat');
            $table->dateTime('tanggal_diterima')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('keterangan');
            $table->string('doc')->nullable();
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
