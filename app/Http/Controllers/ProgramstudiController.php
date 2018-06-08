<?php

namespace App\Http\Controllers;

use App\programstudi;
use App\fasilitas;
use App\industri;
use App\struktur;
use Illuminate\Http\Request;

class ProgramstudiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programstudi = programstudi::with('fasilitas','industri','struktur')->get();
        return view('programstudi.index',compact('programstudi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	 $fasilitas = fasilitas::all();
         $industri = industri::all();
         $struktur = struktur::all();
         return view('programstudi.create',compact('fasilitas','industri','struktur'));
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
            'nama_program' => 'required|max:255',
            'fasilitas_id'=>'required',
            'industris_id'=>'required',
            'strukturs_id'=>'required'
            ]);
      
        $programstudi = new programstudi;
        $programstudi->nama_program = $request->nama_program;
        $programstudi->fasilitas_id = $request->fasilitas_id;
        $programstudi->industris_id = $request->industris_id;
        $programstudi->strukturs_id = $request->strukturs_id;
        $programstudi->save();
        return redirect()->route('program_studis.index');
    }

    /**id_eskulDisplay the sid_eskulified resource.
     *
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $programstudi = programstudi::findOrFail($id);
        return view('programstudi.show',compact('programstudi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jurusan = jurusan::findOrFail($id);
        $fasilitas = fasilitas::all();
        $selectedFasilitas = programstudi::findOrFail($id)->fasilitas_id;
        $industri = industri::all();
        $selectedIndustri = programstudi::findOrFail($id)->industris_id;
        $struktur = struktur::all();
        $selectedStruktur = programstudi::findOrFail($id)->strukturs_id;
        return view('programstudi.edit',compact('programstudi','fasilitas','industri','struktur',
        'selectedFasilitas','selectedIndustri','selectedStruktur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_program' => 'required|max:255',
            'fasilitas_id'=>'required',
            'industris_id'=>'required',
            'strukturs_id'=>'required'
            ]);
      
        $programstudi = new programstudi;
        $programstudi->nama_program = $request->nama_program;
        $programstudi->fasilitas_id = $request->fasilitas_id;
        $programstudi->industris_id = $request->industris_id;
        $programstudi->strukturs_id = $request->strukturs_id;
        $programstudi->save();
        return redirect()->route('program_studis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mapel_siswa  $mapel_siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $programstudi = programstudi::findOrFail($id);
        $programstudi->delete();
        return redirect()->route('program_studis.index');  
    }
}
