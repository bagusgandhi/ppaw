<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::count();
        dd($products);
    }
    
    public function minmax(){
        $maxHarga = Product::where('jenis_id', '5')->max('harga');
        $minHarga = Product::where('jenis_id', '5')->min('harga');
        dd($maxHarga, $minHarga);
    }
    public function avgsum(){
        $avg = Product::where('jenis_id', '5')->avg('harga');
        $sum = Product::where('jenis_id', '5')->sum('harga');
        dd($avg, $sum);
    }
    public function select(){
        $sel = Product::select('jenis_id', 'nama_barang')->get();
        // $sum = Product::where('jenis_id', '5')->sum('harga');
        foreach($sel as $s){

           echo $s->jenis_id. $s->nama_barang."</br>";
        }
    }
    public function distinct(){
        $dist = Product::select('jenis_id')->distinct('jenis_id')->get();
        // $sum = Product::where('jenis_id', '5')->sum('harga');
        foreach($dist as $s){

           echo $s->jenis_id."</br>";
        }
    }
}
