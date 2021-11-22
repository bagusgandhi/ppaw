<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;
    protected $table = 'gajis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tahun',
        'bulan',
    ];

    public function getPegawai(){
        return $this->belongsTo('\App\Models\Pegawai', 'pegawai_id');
    }
}
