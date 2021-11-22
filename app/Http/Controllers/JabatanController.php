<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller{
    public function index(Request $request){
        $search = $request->get('search');
        $p = Jabatan::paginate();
        $jabatan = Jabatan::where('nama_jabatan', 'LIKE', '%'.$search.'%')->paginate($p->perPage());

        return view('jabatan.index', compact('jabatan'))->with('i', (request()->input('page', 1) - 1) *
        $p->perPage());
    }

    public function create(){
        $jabatan = new Jabatan();
        return view('jabatan.create', compact('jabatan'));
    }

    public function store(Request $request){
        request()->validate(Jabatan::$rules);
        \DB::beginTransaction();
            try{
                //menyimpan ke tabel mst_jabatan
                $jabatan= new Jabatan();
                $jabatan->nama_jabatan=$request->nama_jabatan;
                $jabatan->tunjangan =$request->tunjangan;
                $jabatan->save();
                //jika tidak ada kesalahan commit/simpan
                \DB::commit();
                // mengembalikan tampilan ke view index (halaman sebelumnya)
                return redirect()->route('jabatan.index')->with('success', 'MstJabatan telah berhasil disimpan.');
            } catch (\Throwable $e) {
                //jika terjadi kesalahan batalkan semua
                \DB::rollback();
                return redirect()->route('jabatan.index')->with('success', 'Penyimpanan dibatalkan semua, ada kesalahan...');
            } 
    }

    public function edit($id){
        $jabatan = Jabatan::find($id);
        //menampikan 1 rekaman ke view edit
        return view('jabatan.edit', compact('jabatan'));
    }

    public function update(Request $request,      $id){
        request()->validate(Jabatan::$rules);
        //mulai transaksi
        \DB::beginTransaction();
        try{
            $jabatan= Jabatan::find($id);
            $jabatan->nama_jabatan=$request->nama_jabatan;
            $jabatan->tunjangan =$request->tunjangan;
            $jabatan->save();
            \DB::commit();
            //mengembalikan tampilan ke view index (halaman sebelumnya)
            return redirect()->route('jabatan.index')->with('success', 'MstJabatan berhasil diubah');
        } catch (\Throwable $e) {
            //jika terjadi kesalahan batalkan semua
            \DB::rollback();
            return redirect()->route('jabatan.index')->with('success', 'MstJabatan batal diubah, ada kesalahan');
        }
    }

    public function show($id){
        $jabatan = Jabatan::find($id);
        //menampikan ke view show
        return view('jabatan.show', compact('jabatan'));
    }

    public function destroy($id){
        //mulai transaksi
        \DB::beginTransaction();
        try{
            //menghapus 1 rekaman tabel jabatan
            $jabatan = Jabatan::find($id)->delete();
            \DB::commit();
            // mengembalikan tampilan ke view index (halaman sebelumnya)
            return redirect()->route('jabatan.index')->with('success', 'MstJabatan berhasil dihapus');
        } catch (\Throwable $e) {
            //jika terjadi kesalahan batalkan semua
            \DB::rollback();
            return redirect()->route('jabatan.index')->with('success', 'MstJabatan ada kesalahan hapus batal... ');
        }
    }
}
