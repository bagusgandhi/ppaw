<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\RiwayatPangkat;
use App\Models\MstPangkat;

class RiwayatPangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $p = Pegawai::paginate();

        // $pegawai = Pegawai::join('jabatans','pegawai.jabatan_id','=','jabatans.id');
        $pegawai = \DB::table('pegawais')->join('jabatans','pegawais.jabatan_id','=','jabatans.id')->select('pegawais.id','pegawais.nama','pegawais.alamat','jabatans.nama_jabatan')
        ->where('pegawais.id','LIKE','%'.$search.'%')
        ->orwhere('pegawais.nama','LIKE','%'.$search.'%')
        ->orWhere('pegawais.alamat','LIKE', '%'.$search.'%')
        ->paginate($p->perPage());

        return view('riwayat-pangkat.index', compact('pegawai'))
        ->with('i', (request()->input('page', 1) - 1) * $p->perPage());

    }

    public function proses($id){
        $rw = RiwayatPangkat::where('pegawai_id', $id)->get();
        $peg = Pegawai::find($id);
        return view('riwayat-pangkat.index1', compact('rw','peg'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($peg_id)
    {
        //untuk mengisi pilihan gol/pangkat
        $pangkat=\DB::table('mst_pangkats')->pluck(
        \DB::raw('CONCAT(pangkat_gol," ",nama_pangkat) as nama_pangkat'),'id');
        $rw = new RiwayatPangkat();
        //membaca identitas pegawai
        $peg = Pegawai::find($peg_id);
        return view('riwayat-pangkat.create', compact('rw','pangkat','peg'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \DB::beginTransaction();
        try{
            RiwayatPangkat::insert([
                'tanggal' => $request->tanggal,
                'no_sk_jabatan' => $request->no_sk_jabatan,
                'gaji_pokok' => $request->gaji_pokok,
                'status' => $request->status,
                'pegawai_id' => $request->pegawai_id,
                'mst_pangkat_id' => $request->mst_pangkat_id
            ]);
        \DB::commit();
            return redirect()->route('riwayat-pangkat.index')->with('success', 'Riwayat Pangkat telah berhasil disimpan.');
        } catch (\Throwable $e) {
            \DB::rollback();
            return redirect()->route('riwayat-pangkat.index')->with('danger', 'Riwayat Pangkat telah berhasil disimpan.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peg = Pegawai::find($id);
        $rw = RiwayatPangkat::find($id);
        return view('riwayat-pangkat.show', compact('rw', 'peg'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rw = RiwayatPangkat::find($id);
        $peg_id = RiwayatPangkat::where('id',$id)->first();
        $peg = Pegawai::find($peg_id->pegawai_id);
        $pangkat = MstPangkat::select("id", \DB::raw("CONCAT(mst_pangkats.pangkat_gol,' ',mst_pangkats.nama_pangkat) as nama_pangkat"))
            ->pluck('nama_pangkat', 'id');
        return view('riwayat-pangkat.edit', compact('rw','peg','pangkat'));
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
        \DB::beginTransaction();
        try{
            RiwayatPangkat::where('id', $id)->update([
                'tanggal' => $request->tanggal,
                'no_sk_jabatan' => $request->no_sk_jabatan,
                'gaji_pokok' => $request->gaji_pokok,
                'status' => $request->status,
                'pegawai_id' => $request->pegawai_id,
                'mst_pangkat_id' => $request->mst_pangkat_id
            ]);
        \DB::commit();
            return redirect()->route('riwayat-pangkat.index')->with('success', 'Riwayat Pangkat telah berhasil disimpan.');
        } catch (\Throwable $e) {
            \DB::rollback();
            return redirect()->route('riwayat-pangkat.index')->with('danger', 'Riwayat Pangkat telah berhasil disimpan.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \DB::beginTransaction();
        try{
            //menghapus 1 rekaman tabel pegawai
            $pegawai = RiwayatPangkat::find($id)->delete();
            \DB::commit();
            // mengembalikan tampilan ke view index (halaman sebelumnya)
            return redirect()->route('riwayat-pangkat.index')->with('success', 'Pegawai berhasil dihapus');
        } catch (\Throwable $e) {
            //jika terjadi kesalahan batalkan semua
            \DB::rollback();
            return redirect()->route('riwayat-pangkat.index')->with('danger', 'Pegawai ada kesalahan hapus batal... ');
        }
    }
}
