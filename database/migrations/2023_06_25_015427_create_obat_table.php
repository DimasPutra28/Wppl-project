<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('obat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namaobat');
            $table->date('tglpesan');
            $table->string('kuantitas');
            $table->string('massa');
            $table->string('kategori');
            $table->string('statuskonsum');
            $table->enum('statusobat',['Aktif','Tidak Aktif']);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat');
    }
};
