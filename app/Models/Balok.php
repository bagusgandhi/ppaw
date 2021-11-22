<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balok extends SegiEmpat
{
    use HasFactory;
    public $tebal;

    public function volume(){
        return $this->tebal * $this->luas();
    } 

}
