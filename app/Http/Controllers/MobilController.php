<?php

namespace App\Http\Controllers;

use App\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    public function index()
    {
        $mobil = Mobil::all();
        return view('dashboard.dataMobil.index', compact('mobil'));
    }

    public function create()
    {
        return view('dashboard.dataMobil.create');
    }
        
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_mobil'    => 'required',
            'harga'         => 'required',
            'stok'          => 'required'
        ]);
        $mobil = new Mobil();
        $mobil->nama_mobil  = $request->input('nama_mobil');
        $mobil->harga       = $request->input('harga');
        $mobil->stok        = $request->input('stok');
        $mobil->save();

        $request->session()->flash('message', 'Sukses menambahkan data Mobil');
        return redirect()->route('mobil.index');;
    }

    public function edit($id)
    {
        $mobil = Mobil::find($id);
        return view('dashboard.dataMobil.edit', compact('mobil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_mobil'    => 'required',
            'harga'         => 'required',
            'stok'          => 'required'
        ]);
        $mobil = Mobil::find($id);
        $mobil->nama_mobil      = $request->input('nama_mobil');
        $mobil->harga           = $request->input('harga');
        $mobil->stok            = $request->input('stok');
        $mobil->save();
        $request->session()->flash('message', 'Sukses updated mobil');
        return redirect()->route('mobil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $mobil = Mobil::find($request->id);
        if($mobil){
            $mobil->delete();
        }
        return redirect()->route('mobil.index');
    }
}
