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
        $pemeliharaans = Pemeliharaan::all();
        return view('admin.pemeliharaan_create', compact('pemeliharaans'));
    }
    public function store(Request $request)
    {
        //
    }
    public function edit($pemeliharaan_id)
    {
        //
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
