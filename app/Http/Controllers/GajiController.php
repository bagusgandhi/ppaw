<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Gaji;
use App\Models\RiwayatPangkat;
use App\Models\Jabatan;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $gaji = new Gaji();
        return view('gaji.index', compact('gaji'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function listGaji(){
        
    }
    public function store(Request $request)
    {
        \DB::beginTransaction();
        try{
            $pegawai = Pegawai::all();
            foreach($pegawai as $p){
                $data[] = [
                    'tahun' => $request->tahun,
                    'bulan' =>  $request->bulan,
                    'pegawai_id' => $p->id,
                    'gaji_pokok' => RiwayatPangkat::getGapok($p->id),
                    'tunjangan' => Jabatan::getTunjangan($p->jabatan_id),
                    'potongan' => 100,
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                ];
            }
            Gaji::insert($data);
            \DB::commit();
            return redirect()->route('gaji.lists')->with('success', 'Data Gaji sudah disimpan!');
        }catch(\Throwable $e){
            \DB::rollback();
        }

       

    }
     
    public function listsGaji(Request $request){
        $tahun = date('Y');
        $bulan = date('m');
        $gaji = Gaji::where('tahun', '=', $tahun, 'and')->where('bulan', '=', $bulan)->get();
        return view('gaji.lists',compact('gaji'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
