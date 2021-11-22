<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class segiTiga extends Model
{
    use HasFactory;
    public $alas;
    public $tinggi;

    public function luas(){
        return 1/2 * $this->alas * $this->tinggi;
    }

    public function keliling(){

    }
}
