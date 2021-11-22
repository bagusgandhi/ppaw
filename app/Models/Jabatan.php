<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatans';
    protected $primarykey = 'id';

    static $rules = [
        'nama_jabatan' => 'required',
        'tunjangan' => 'required'
    ];

    protected $perPage = 20;

    protected $fillable = [
        'nama_jabatan', 'tunjangan'
    ];

    static function getTunjangan($id){
        $tunjangan = self::select('tunjangan')->where('id', $id)->first();
        return $tunjangan->tunjangan;
    }
}
