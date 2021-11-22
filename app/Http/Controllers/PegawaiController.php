<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use File;

class PegawaiController extends Controller
{
    public function index(Request $request){
        //variabel pecarian
        $search = \Request::get('search');
        $p = Pegawai::paginate(); //mangatur tampil perhalaman

        //menjalankan query builder
        $pegawai = \DB::table('pegawais')
        ->join('jabatans', 'pegawais.jabatan_id', '=', 'jabatans.id')
        ->select('pegawais.id', 'pegawais.nip', 'pegawais.nama', 'pegawais.alamat',
        'jabatans.nama_jabatan')
        ->where('pegawais.id','LIKE','%'.$search.'%')
        ->orwhere('pegawais.nip','LIKE','%'.$search.'%')
        ->orwhere('pegawais.nama','LIKE','%'.$search.'%')
        ->orWhere('pegawais.alamat','LIKE', '%'.$search.'%')
        ->paginate($p->perPage());


        //memanggil view dan menyertakan hasil quey
        return view('pegawai.index', compact('pegawai'))->with('i', (request()->input('page', 1) - 1) * $p->perPage());
    }

    public function create(){
        $jabatan= Jabatan::pluck('nama_jabatan', 'id');
        $pegawai = new Pegawai();
        return view('pegawai.create', compact('pegawai','jabatan'));
    }

    public function store(Request $request){
        //cek validasi masukan
        request()->validate(Pegawai::$rules);

        //mulai transaksi
    \DB::beginTransaction();
        try{
        //menjalankan query builder untuk menyimpan ke tabel pegawai

        $file = $request->file('file_foto');
        $ext = $file->getClientOriginalExtension();

        $fileFoto = $request->nip.".".$ext;
        //menyimpan ke folder /file
        $request->file('file_foto')->move("foto/", $fileFoto);

        Pegawai::insert([
            'nip'=>$request->nip,
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            // 'tanggal_lahir'=>$request->tanggal_lahir,
            'jenis_kel'=>$request->jenis_kel,
            'agama'=>$request->agama,
            'telepon'=>$request->telepon,
            'email'=>$request->email,
            'file_foto'=>$fileFoto,
            'jabatan_id'=>$request->jabatan_id,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);


        //jika tidak ada kesalahan commit/simpan
        \DB::commit();
            // mengembalikan tampilan ke view index (halaman sebelumnya)
            return redirect()->route('pegawai.index')->with('success', 'Pegawai telah berhasil disimpan.');
        } catch (\Throwable $e) {
            //jika terjadi kesalahan batalkan semua
            \DB::rollback();
            return redirect()->route('pegawai.index')->with('danger', 'Penyimpanan dibatalkan semua, ada kesalahan...');
        }

    }

    public function edit($id){
        $pegawai = Pegawai::find($id);
        $jabatan = Jabatan::pluck('nama_jabatan','id');
        //menampikan 1 rekaman ke view edit
        return view('pegawai.edit', compact('pegawai','jabatan'));
    }

    public function update(Request $request, $id){
        request()->validate(Pegawai::$rules);
        //mulai transaksi
        \DB::beginTransaction();
            try{
                $pegawai = Pegawai::find($id);
                $nip = Pegawai::get('nip');
                if ($request->hasFile('file_foto')){
                    $image_path = "foto/".$pegawai->file_foto;
                    if (File::exists($image_path)){
                        File::delete($image_path);
                    }
                $file = $request->file('file_foto');
                $ext = $file->getClientOriginalExtension();
                $fileFoto = $nip.".".$ext;
                $destinationPath = 'foto/';
                $file->move($destinationPath, $fileFoto);
                } else {
                    $fileFoto = $pegawai->file_foto;
                }

        \DB::table('pegawais')->where('id', $id)->update([
            'nip'=>$request->nip,
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'jenis_kel'=>$request->jenis_kel,
            'agama'=>$request->agama,
            'telepon'=>$request->telepon,
            'email'=>$request->email,
            'file_foto'=> $fileFoto,
            'jabatan_id'=>$request->jabatan_id,
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);

        \DB::commit();
        //mengembalikan tampilan ke view index (halaman sebelumnya)
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diubah');
        } catch (\Throwable $e) {
            //jika terjadi kesalahan batalkan semua
            \DB::rollback();
            return redirect()->route('pegawai.index')->with('success', 'Pegawai batal diubah, ada kesalahan');
        }
    }

    public function show($id){
        $pegawai = Pegawai::find($id);
        //menampikan ke view show
        return view('pegawai.show', compact('pegawai'));
    }

    public function destroy($id){
        //mulai transaksi
        \DB::beginTransaction();
        try{
            //menghapus 1 rekaman tabel pegawai
            $pegawai = Pegawai::find($id)->delete();
            \DB::commit();
            // mengembalikan tampilan ke view index (halaman sebelumnya)
            return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus');
        } catch (\Throwable $e) {
            //jika terjadi kesalahan batalkan semua
            \DB::rollback();
            return redirect()->route('pegawai.index')->with('success', 'Pegawai ada kesalahan hapus batal... ');
        }
    }

}
