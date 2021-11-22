<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SegiEmpat extends Model
{
    use HasFactory;

    public $panjang;
    public $lebar;

    public function luas(){
        return $this->panjang * $this->lebar; 
    }

    public function keliling(){
        return 2*($this->panjang + $this->lebar);
    }
}
