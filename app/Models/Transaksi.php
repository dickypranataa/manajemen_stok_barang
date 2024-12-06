<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika tabel mengikuti konvensi Laravel)
    protected $table = 'Transaksi';

    // Primary key (opsional jika berbeda dari 'id')
    protected $primaryKey = 'id_transaksi';

    // Non-incrementing or non-numeric primary key
    public $incrementing = true;

    // Tipe data primary key
    protected $keyType = 'int';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'id_transaksi',
        'id_barang',
        'tgl_transaksi',
        'user_id',
        'satuan',
        'jml_barang',
        'tipe'
    ];

    // Menonaktifkan timestamps jika tabel tidak memiliki kolom created_at dan updated_at
    public $timestamps = false;

    /**
     * Relasi ke tabel Barang (Many-to-One)
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }

    /**
     * Relasi ke tabel User (Many-to-One)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
