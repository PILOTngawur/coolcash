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
         Schema::create('uang_keluar', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('category_id');
    $table->decimal('nominal', 15, 2);
    $table->text('keterangan')->nullable();
    $table->date('tanggal');
    $table->timestamps();

    $table->foreign('category_id')
          ->references('id')
          ->on('categories_debit')
          ->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debit');
    }
};
