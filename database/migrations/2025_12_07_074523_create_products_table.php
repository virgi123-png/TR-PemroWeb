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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('foto_produk')->nullable();
            $table->string('nama_produk');
            $table->decimal('harga_produk', 12, 2);
            $table->integer('stock_produk')->default(0);
            $table->text('deskripsi_singkat_produk')->nullable();
            $table->foreignId('tipe_jam_id')->nullable()->constrained('tipe_jams')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();

            $table->index('nama_produk');
            $table->index('harga_produk');
            $table->index('stock_produk');
            $table->index('tipe_jam_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
