<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complain;
use App\Models\Asset;
use Illuminate\Support\Facades\Auth;


class ComplainController extends Controller
{
    public function index()
    {
        $complains = Complain::all();
        return view('admin.complain_index', compact('complains'));
    }
    public function create()
    {
        $assets = Asset::all();
        return view('complain_create', compact('assets'));    
    }
    public function store(Request $request)
    {
        $foto = fake()->uuid() . '.' . $request->file('foto')->extension();
        $request->file('foto')->move(public_path('/complain/bukti'), $foto);
        Complain::create([
            'user_id' => Auth::user()->id,
            'asset_id' => $request->asset_id,
            'keterangan' => $request->keterangan,
            'foto' => "/complain/bukti/$foto",
        ]);
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
        $foto = fake() -> uuid() . '.' . $request->file('foto')->extension();
        $request->file('foto')->move(public_path('/complain/bukti'), $foto);
        $complain -> update([
            'asset_id' => $request->asset_id,
            'keterangan' => $request->keterangan,
            'foto' => "/complain/bukti/$foto",
            'status' => "sudah dibaca",
        ]);
        return redirect('/complain/index');
    }
    public function destroy($complain_id)
    {
        $complain = Complain::find($complain_id)->delete();
        return redirect('/complain/index');
    }
}
