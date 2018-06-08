<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\struktur;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    // menampilkan semua data post melalui model 'Post'
        $struktur = struktur::all();
        return view('struktur.index',compact('struktur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('struktur.create');
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
            'bidang' => 'required|max:255'
        ]);

        $struktur = new struktur;
        $struktur->nama = $request->nama;
        $struktur->bidang = $request->bidang;
        $struktur->save();
        return redirect()->route('strukturs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $struktur = struktur::findOrFail($id);
        return view('struktur.show',compact('struktur'));
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
        $struktur = struktur::findOrFail($id);
        return view('struktur.edit',compact('struktur'));
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
            'bidang' => 'required|max:255'
        ]);

        // update data berdasarkan id
        $struktur = struktur::findOrFail($id);
        $struktur->nama = $request->nama;
        $struktur->bidang = $request->bidang;
        $struktur->save();
        return redirect()->route('strukturs.index');
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
        $struktur = struktur::findOrFail($id);
        $struktur->delete();
        return redirect()->route('strukturs.index');  
    }
}
