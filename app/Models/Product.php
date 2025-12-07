<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['foto_produk', 'nama_produk', 'harga_produk', 'stock_produk', 'deskripsi_singkat_produk', 'tipe_jam_id'];

    public function tipeJam()
    {
        return $this->belongsTo(TipeJam::class, 'tipe_jam_id');
    }
}
