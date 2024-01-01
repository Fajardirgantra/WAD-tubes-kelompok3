<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complain;
use App\Models\Asset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Ruangan;

class ComplainController extends Controller
{
    public function index()
    {
        $complains = Complain::all();
        return view('admin.complain_index', compact('complains'));
    }
    public function create()
    {
        $ruangans = Ruangan::all();
        $assets = Asset::all();
        return view('complain_create', compact('assets', 'ruangans'));
    }
    public function store(Request $request)
    {
        $foto = fake()->uuid() . '.' . $request->file('foto')->extension();
        $request->file('foto')->move(public_path('/complain/bukti'), $foto);
        Complain::create([
            'user_id' => Auth::user()->id,
            'asset_id' => $request->asset_id,
            'ruangan_id' => $request->ruangan_id,
            'keterangan' => $request->keterangan,
            'foto' => "/complain/bukti/$foto",
        ]);
        Session::flash('success', 'Complaint added successfully!');

        return redirect('/complain/create');
    }
    public function edit($complain_id)
    {
        $complain = Complain::find($complain_id);
        $assets = Asset::all();
        return view('admin.complain_edit', compact('complain', 'assets'));
    }
    public function update(Request $request, $complain_id)
    {
        $complain = Complain::find($complain_id);
        if ($request->foto) {
            $foto = fake()->uuid() . '.' . $request->file('foto')->extension();
            $request->file('foto')->move(public_path('/complain/bukti'), $foto);
            $complain->update([
                'ruangan_id' => $request->ruangan_id,
                'asset_id' => $request->asset_id,
                'keterangan' => $request->keterangan,
                'foto' => "/complain/bukti/$foto",
                'status' => $request->status,
            ]);
        } else {
            $complain->update([
                'ruangan_id' => $request->ruangan_id,
                'asset_id' => $request->asset_id,
                'keterangan' => $request->keterangan,
                'status' => $request->status,
            ]);
        }
        return redirect('/complain/index');
    }
    public function destroy($complain_id)
    {
        $complain = Complain::find($complain_id)->delete();
        return redirect('/complain/index');
    }
    public function fetchAssetByRuanganId(Request $request, string $ruanganId)
    {
        $assets = Asset::where(["ruangan_id" => $ruanganId])->get();
        return $assets;
    }
}
