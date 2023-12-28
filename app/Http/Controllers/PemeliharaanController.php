<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemeliharaan;
use App\Models\Asset;

class PemeliharaanController extends Controller
{
    public function index()
    {
        $pemeliharaans = Pemeliharaan::all();
        return view('admin.pemeliharaan_index', compact('pemeliharaans'));
    }
    public function create()
    {
        $assets = Asset::all();
        return view('admin.pemeliharaan_create', compact('assets'));    
    }
    public function store(Request $request)
    {
        $foto = fake() -> uuid() . '.' . $request->file('foto')->extension();
        $request->file('foto')->move(public_path('/pemeliharaan/bukti'), $foto);
        Pemeliharaan::create([
            'asset_id' => $request -> asset_id,
            'jenis_perbaikan' => $request -> jenis_perbaikan,
            'kegiatan' => $request -> kegiatan,
            'foto' => "/pemeliharaan/bukti/$foto",
            'tanggal_pemeliharaan' => $request -> tanggal_pemeliharaan
        ]);
        return redirect('/pemeliharaan/index');
    }
    public function edit($pemeliharaan_id)
    {
        $pemeliharaan = Pemeliharaan::find($pemeliharaan_id);
        $assets = Asset::all();
        return view('admin.pemeliharaan_edit', compact('pemeliharaan', 'assets')); 
    }
    public function update(Request $request, $pemeliharaan_id)
    {
        //
    }
    public function destroy($pemeliharaan_id)
    {
        //
    }
}
