<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // Menentukan kolom yang dapat diisi menggunakan metode mass assignment
    protected $fillable = [
        'username',
        'password',
        'role',
        'tgl_buat',
    ];
}
