<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Penjualan;
use App\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::select('penjualans.*', 'mobils.nama_mobil', 'mobils.harga')
                    ->leftjoin('mobils', 'penjualans.mobil_id', '=', 'mobils.id')
                    ->get();

        return view('dashboard.penjualan.index', compact('penjualan'));
    }

    public function create(Request $request)
    {
        $mobil = Mobil::all();
        
        foreach($mobil as $m){
            if($m->stok == 0){
                $request->session()->flash('message', 'Stok Mobil Habis');
                return redirect()->route('penjualan.index');
            }
        }
        return view('dashboard.penjualan.create', compact('mobil'));
    }
        
    public function store(Request $request)
    {
        $penjualan = Penjualan::create([
            'nama_pembeli' => $request['nama_pembeli'],
            'email'        => $request['email'],
            'no_hp'        => $request['no_hp'],
            'mobil_id'     => $request['mobil_id']
        ]);

        $mobil = Mobil::where('id',$penjualan->mobil_id)
                        ->get();
        
        if(!empty($mobil)){
            foreach($mobil as $m){
                $invoice = Invoice::create([
                    'no_invoice'    => 'INV/'.$penjualan->id.'/000'.$m->id,
                    'penjualan_id'  => $penjualan->id,
                    'total'         => $m->harga
                ]);
            }
        }

        $stokmobil = Mobil::find($penjualan->mobil_id);
        $stokmobil->stok = $stokmobil->stok - 1;
        $stokmobil->save();

        $request->session()->flash('message', 'Sukses menambahkan data penjualan');
        return redirect()->route('penjualan.index');
    }

    public function edit($id)
    {
        $penjualan = Penjualan::find($id);
        $mobil = Mobil::all();
                    
        return view('dashboard.penjualan.edit', compact('penjualan', 'mobil'));
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
            'nama_pembeli'  => 'required',
            'email'         => 'required',
            'no_hp'         => 'required',
            'mobil_id'      => 'required'
        ]);
        $penjualan = Penjualan::find($id);
        $penjualan->nama_Pembeli  = $request->input('nama_pembeli');
        $penjualan->email         = $request->input('email');
        $penjualan->no_hp         = $request->input('no_hp');
        $penjualan->mobil_id      = $request->input('mobil_id');
        $penjualan->save();

        $request->session()->flash('message', 'Sukses updated penjualan');
        return redirect()->route('penjualan.index');
    }

    public function invoice($id)
    {
        $penjualan = Penjualan::find($id);
        $invoice = Invoice::query()
                ->leftjoin('penjualans', 'invoices.penjualan_id', '=', 'penjualans.id')
                ->leftjoin('mobils', 'penjualans.mobil_id', '=', 'mobils.id')
                ->where('penjualans.id', '=', $id)
                ->get();

        return view('dashboard.invoice.index', compact('penjualan', 'invoice'));
    }

    public function info()
    {
        $penjualan = Penjualan::countMobil();
        $countPenjualan = Penjualan::countPenjualan();
        $countPercent = Penjualan::countPercent();
        $sumTotal = Penjualan::sumTotal();

        return view('dashboard.penjualan.info', compact('penjualan', 'countPenjualan', 'countPercent', 'sumTotal'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periode  $periode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $penjualan = Penjualan::find($request->id);
        if($penjualan){
            $penjualan->delete();
        }
        return redirect()->route('penjualan.index');
    }
}
