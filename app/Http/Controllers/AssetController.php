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
    
}
