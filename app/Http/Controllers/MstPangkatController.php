<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MstPangkat;

class MstPangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $p = MstPangkat::paginate();

        $mstPangkat = MstPangkat::where('nama_pangkat', 'LIKE', '%' . $search .'%')->orWhere('pangkat_gol','LIKE', '%'.$search.'%')
        ->paginate($p->perPage());
       
        return view('mst-pangkat.index', compact('mstPangkat'))->with('i', (request()->input('page', 1) - 1) * $p->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mstPangkat = new MstPangkat();
        return view('mst-pangkat.create', compact('mstPangkat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(MstPangkat::$rules);
        \DB::beginTransaction();
        try{
            MstPangkat::insert([
                'nama_pangkat' => $request->nama_pangkat,
                'pangkat_gol' => $request->pangkat_gol,
            ]);
        \DB::commit();
        return redirect()->route('mst-pangkat.index')->with('success','Data telah berhasil disimpan.');
        } catch(\Throwable $e){
            \DB::rollback();
            return redirect()->route('mst-pangkat.index')->with('success','Penyimpanan dibatalkan semua, ada kesalahan...');
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
        $mstPangkat = MstPangkat::find($id);
        return view('mst-pangkat.show', compact('mstPangkat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mstPangkat = MstPangkat::find($id);
        return view('mst-pangkat.edit', compact('mstPangkat'));
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
        request()->validate(MstPangkat::$rules);
        \DB::beginTransaction();
        try{
            MstPangkat::where('id', $id)->update([
                'nama_pangkat' => $request->nama_pangkat,
                'pangkat_gol' => $request->pangkat_gol,
            ]);
            \DB::commit();
            return redirect()->route('mst-pangkat.index')->with('success', 'Data berhasil diubah');
        }catch(\Throwable $e){
            \DB::rollback();
            return redirect()->route('mst-pangkat.index')->with('success', 'Data batal diubah, ada kesalahan');

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
            $mstPangkat = MstPangkat::find($id)->delete();
            \DB::commit();
            return redirect()->route('mst-pangkat.index')->with('success', 'Data berhasil dihapus');
        }catch(\Throwable $e){
            \DB::rollback();
            return redirect()->route('mst-pangkat.index')->with('success','Data ada kesalahan hapus batal... ');
        }
    }
}
