<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = ['angsuran_mingguan','simpanan_wajib','jumlah_gaji','id_karyawan','id_pinjaman'];
}
