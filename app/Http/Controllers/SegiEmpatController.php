<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\SegiEmpat;
use App\Models\Balok;
use Illuminate\Support\Facades\Validator;


class SegiEmpatController extends Controller
{
    public function inputSegiEmpat(){
        return View::make('segi-empat.inputSegiEmpat');
    }
    public function inputBalok(){
        return View::make('segi-empat.inputBalok');
    }

    public function hasil(Request $request){
        $segiEmpat = new SegiEmpat;
        //aturan validasi
        $rules=[
            'panjang'=>'required|numeric',
            'lebar'=>'required|numeric'];

        $validator = Validator::make( $request->all(), $rules);
        //cek validasi
        if ($validator->fails()){
            //jika salah kembalikan ke form untuk diperbaiki
            return View::make('segi-empat.inputSegiEmpat', compact('segiEmpat'))->withErrors($validator);
        }else{
            //lanjutkan ke menampilkan hasil/
            $segiEmpat->panjang=$request->panjang;
            $segiEmpat->lebar = $request->lebar;

            return View::make('segi-empat.hasil',compact('segiEmpat'));
        }
    }

    public function hasilBalok(Request $request){
        $balok = new Balok;
        $rules = [
            'panjang'=>'required|numeric',
            'lebar'=>'required|numeric',
            'tebal'=>'required|numeric'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return View::make('segi-empat.inputBalok', compact('Balok'))->withErrors($validator);
        }else{
            $balok->panjang = $request->panjang;
            $balok->lebar = $request->lebar;
            $balok->tebal = $request->tebal;

            return View::make('segi-empat.hasilBalok', compact('balok'));
        }
    }

}
