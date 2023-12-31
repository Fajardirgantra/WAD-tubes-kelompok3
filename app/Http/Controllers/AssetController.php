<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Ruangan;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::all();
        return view('admin.asset_index', compact('assets'));
    }
    public function create()
    {
        $ruangans = Ruangan::all();
        return view('admin.asset_create', compact('ruangans'));    
    }
    public function store(Request $request)
    {
        Asset::create([
            'ruangan_id' => $request->ruangan_id,
            'kode_asset' => $request->kode_asset,
            'nama_asset' => $request->nama_asset,
            'kategori' => $request->kategori,
            'tanggal_masuk' => $request->tanggal_masuk
        ]);
        return redirect('/asset/index');
    }
    public function edit($asset_id)
    {
        $asset = Asset::find($asset_id);
        $ruangans = Ruangan::all();
        return view('admin.asset_edit', compact('asset', 'ruangans')); 
    }
    public function update(Request $request, $asset_id)
    {
        $asset = Asset::find($asset_id);
        $asset -> update([
            'ruangan_id' => $request->ruangan_id,
            'kode_asset' => $request->kode_asset,
            'nama_asset' => $request->nama_asset,
            'kategori' => $request->kategori,
            'tanggal_masuk' => $request->tanggal_masuk
        ]);
        return redirect('/asset/index');
    }
    public function destroy($asset_id)
    {
        $asset = Asset::find($asset_id);
        $asset -> delete();
        return redirect('/asset/index');
    }
}
