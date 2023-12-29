<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\Asset;

class RuanganController extends Controller
{
    public function index()
    {
        $ruangans = Ruangan::all();
        return view('admin.ruangan_index', compact('ruangans'));
    }
    public function create()
    {
        return view('admin.ruangan_create');    
    }
    public function store(Request $request)
    {
        Ruangan::create([
            'kode_ruangan' => $request->kode_ruangan,
            'nama_ruangan' => $request->nama_ruangan
        ]);
        return redirect('/ruangan/index');
    }
    public function edit($ruangan_id)
    {
        $ruangan = Ruangan::find($ruangan_id);
        return view('admin.ruangan_edit', compact('ruangan')); 
    }
    public function update(Request $request, $ruangan_id)
    {
        $ruangan = Ruangan::find($ruangan_id);
        $ruangan -> update([
            'kode_ruangan' => $request->kode_ruangan,
            'nama_ruangan' => $request->nama_ruangan
        ]);
        return redirect('/ruangan/index');
    }
    public function destroy($ruangan_id)
    {
        $ruangan = Ruangan::find($ruangan_id);
        $ruangan -> delete();
        return redirect('/ruangan/index');
    }
    public function show($ruangan_id)
    {
        $assets = Asset::where('ruangan_id', '=', $ruangan_id) -> get();
        return view('admin.ruangan_show', compact('assets')); 
    }
}
