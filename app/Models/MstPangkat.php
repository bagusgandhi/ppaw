<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstPangkat extends Model
{
    use HasFactory;
    protected $table = 'mst_pangkats';
    protected $primarykey = 'id';

    static $rules = [
        'nama_pangkat' => 'required',
        'pangkat_gol' => 'required'
    ];

    protected $perPage = 10;

    protected $fillable = ['nama_pangkat', 'pangkat_gol'];


}
