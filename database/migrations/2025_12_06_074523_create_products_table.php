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
            $table->string('foto_produk')->nullable(); // Untuk path/URL uploadan gambar
            $table->string('nama_produk'); // String untuk nama produk
            $table->decimal('harga_produk', 12, 2); // Decimal, 12 digit total, 2 digit desimal (dalam Rupiah)
            $table->integer('stock_produk')->default(0); // Integer, default 0
            $table->text('deskripsi_singkat_produk')->nullable(); // Text, nullable
            $table->string('kategori_produk')->nullable(); // String, nullable
            $table->timestamps();
            $table->softDeletes(); // Untuk soft delete

            // Index untuk performa query
            $table->index('nama_produk');
            $table->index('harga_produk');
            $table->index('stock_produk');
            $table->index('kategori_produk');
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
