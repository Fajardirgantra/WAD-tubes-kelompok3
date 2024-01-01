<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemeliharaan;
use App\Models\Asset;
use App\Models\Ruangan;

class PemeliharaanController extends Controller
{
    public function index()
    {
        $pemeliharaans = Pemeliharaan::all();
        return view('admin.pemeliharaan_index', compact('pemeliharaans'));
    }
    public function create()
    {
        $ruangans = Ruangan::all();
        $assets = Asset::where('ruangan_id', $ruangans->first()->id)->get();
        return view('admin.pemeliharaan_create', compact('assets', 'ruangans'));
    }
    public function store(Request $request)
    {
        $foto = fake()->uuid() . '.' . $request->file('foto')->extension();
        $request->file('foto')->move(public_path('/pemeliharaan/bukti'), $foto);
        Pemeliharaan::create([
            'asset_id' => $request->asset_id,
            'ruangan_id' => $request->ruangan_id,
            'jenis_perbaikan' => $request->jenis_perbaikan,
            'kegiatan' => $request->kegiatan,
            'foto' => "/pemeliharaan/bukti/$foto",
            'tanggal_pemeliharaan' => $request->tanggal_pemeliharaan
        ]);
        return redirect('/pemeliharaan/index');
    }

    public function fetchAssetByRuanganId(Request $request, string $ruanganId)
    {
        $assets = Asset::where(["ruangan_id" => $ruanganId])->get();
        return $assets;
    }

    public function edit($pemeliharaan_id)
    {
        $pemeliharaan = Pemeliharaan::find($pemeliharaan_id);
        $assets = Asset::all();
        $ruangans = Ruangan::all();
        return view('admin.pemeliharaan_edit', compact('pemeliharaan', 'assets', 'ruangans'));
    }
    public function update(Request $request, $pemeliharaan_id)
    {
        $pemeliharaan = Pemeliharaan::find($pemeliharaan_id);
        $foto = fake()->uuid() . '.' . $request->file('foto')->extension();
        $request->file('foto')->move(public_path('/pemeliharaan/bukti'), $foto);
        $pemeliharaan->update([
            'asset_id' => $request->asset_id,
            'ruangan_id' => $request->ruangan_id,
            'jenis_perbaikan' => $request->jenis_perbaikan,
            'kegiatan' => $request->kegiatan,
            'foto' => "/pemeliharaan/bukti/$foto",
            'tanggal_pemeliharaan' => $request->tanggal_pemeliharaan
        ]);
        return redirect('/pemeliharaan/index');
    }
    public function destroy($pemeliharaan_id)
    {
        $pemeliharaan = Pemeliharaan::find($pemeliharaan_id)->delete();
        return redirect('/pemeliharaan/index');
    }
}
