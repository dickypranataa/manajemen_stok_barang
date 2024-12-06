<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika tabel menggunakan nama model dalam bentuk jamak)
    protected $table = 'Barang';

    // Primary key (opsional jika primary key adalah 'id')
    protected $primaryKey = 'id_barang';

    // Non-incrementing or non-numeric primary keys
    public $incrementing = false;

    // Tipe data primary key
    protected $keyType = 'int';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'id_barang',
        'nama_Barang',
        'satuan',
        'stok',
        'tanggal',
        'tgl_kadaluarsa',
        'minimum_Stok'
    ];

    // Menonaktifkan timestamps jika tabel tidak memiliki kolom created_at dan updated_at
    public $timestamps = false;

    /**
     * Scope untuk mencari barang yang perlu restock
     */
    public function scopeNeedRestock($query)
    {
        return $query->whereColumn('stok', '<', 'minimum_Stok');
    }

    /**
     * Relasi ke tabel Transaksi (One-to-Many)
     */
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_barang', 'id_barang');
    }
}
