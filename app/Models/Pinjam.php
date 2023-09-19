<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = ['jumlah_pinjaman','tanggal_pinjam','id_karyawan'];
}
