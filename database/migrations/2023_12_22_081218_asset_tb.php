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
        schema::create('asset', function(Blueprint $table )  {

        $table->id();
        $table->string('kodeasset');
        $table->string('nama');
        $table->string('kategori');
        $table->date('tanggal');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExists('asset');
    }
};
