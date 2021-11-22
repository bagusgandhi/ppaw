<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pegawai;

class RiwayatPangkat extends Model
{
    use HasFactory;
    protected $table = 'riwayat_pangkats';
    protected $primaryKey = 'id';
    protected $fillable = [
        'pegawai_id',
        'mst_pangkat_id',
        'no_sk_pangkat',
        'gaji_pokok',
        'status'
    ];

    public function getPegawai(){
        return $this->belongsTo('\App\Models\Pegawai', 'pegawai_id');
    }
    
    public function getPangkat(){
        return $this->belongsTo('\App\Models\MstPangkat', 'mst_pangkat_id');

    }

    static function listStatus(){

        $pilihan = [
            'tidak berlaku',
            'berlaku'
        ];
        // return array(0=>'Tidak berlaku',1=>'Berlaku');
        return $pilihan;
    }

    static function getGapok($id){
        $gapok = self::where('status', 1)->where('pegawai_id', $id)->orderby('id', 'desc')->pluck('gaji_pokok')->first();
        return $gapok;
    }
    
    static function pGolTerahir($id){
        $pang = self::where('status',1)->where('pegawai_id',$id)->orderby('created_at', 'desc')->first();
        return $pang;
    }

}
