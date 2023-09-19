<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = ['jam_masuk','jam_pulang','hari_masuk','id_karyawan'];
}
