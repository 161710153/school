<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\industri;

class IndustriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    // menampilkan semua data post melalui model 'Post'
        $industri = industri::all();
        return view('industri.index',compact('industri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('industri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'nama' => 'required|max:255',
            'tahun_kerjasama' => 'required|max:255'
        ]);

        $industri = new Industri;
        $industri->nama = $request->nama;
        $industri->tahun_kerjasama = $request->tahun_kerjasama;
        $industri->save();
        return redirect()->route('industris.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $industri = Industri::findOrFail($id);
        return view('industri.show',compact('industri'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // memanggil data pos berdasrkan id di halaman pos edit
        $industri = Industri::findOrFail($id);
        return view('industri.edit',compact('industri'));
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
        // unique dihapus karena ketika update data title tidak diubah juga tidak apa-apa
        $this->validate($request,[
            'nama' => 'required|max:255',
            'tahun_kerjasama' => 'required|max:255'
        ]);

        // update data berdasarkan id
        $industri = Industri::findOrFail($id);
        $industri->nama = $request->nama;
        $industri->tahun_kerjasama = $request->tahun_kerjasama;
        $industri->save();
        return redirect()->route('industris.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete data beradasarkan id
        $industri = Industri::findOrFail($id);
        $industri->delete();
        return redirect()->route('industris.index');  
    }
}
