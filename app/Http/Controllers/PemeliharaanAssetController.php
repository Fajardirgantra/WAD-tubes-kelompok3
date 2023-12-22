<?php

namespace App\Http\Controllers;

use App\Models\pemeliharaanasset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PemeliharaanAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if (strlen($katakunci)) {
            $data = pemeliharaanasset::where('asset', 'like', "%$katakunci%")
                ->orWhere('tanggal', 'like', "%$katakunci%")
                ->orWhere('jenis', 'like', "%$katakunci%")
                ->orWhere('kegiatan', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = pemeliharaanasset::orderBy('asset', 'desc')->paginate($jumlahbaris);
        }
        return view('pemeliharaanasset.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemeliharaanasset.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('asset', $request->asset);
        Session::flash('tanggal', $request->tanggal);
        Session::flash('jenis', $request->jenis);
        Session::flash('kegiatan', $request->kegiatan);

        $request->validate([
            'asset' => 'required',
            'tanggal' => 'required',
            'jenis' => 'required',
            'kegiatan' => 'required',

        ], [
            'asset.required' => 'Asset wajib terisi',
            'tanggal.required' => 'Tanggal wajib terisi',
            'jenis.required' => 'jenis wajib terisi',
            'kegiatan.required' => 'Kegiatan wajib terisi',
        ]);
        $data = [
            'asset' => $request->asset,
            'tanggal' => $request->tanggal,
            'jenis' => $request->jenis,
            'kegiatan' => $request->kegiatan,
            'bukti' => $request->bukti,
        ];
        pemeliharaanasset::create($data);
        return redirect()->to('pemeliharaanasset')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = pemeliharaanasset::where('asset', $id)->first();
        return view('pemeliharaanasset.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'asset' => 'required',
            'tanggal' => 'required',
            'kegiatan' => 'required',
        ], [
            'asset.required' => 'Asset wajib diisi',
            'tanggal.required' => 'tanggal wajib diisi',
            'kegiatan.required' => 'Kegiatan wajib diisi',
        ]);
        $data = [
            'asset' => $request->asset,
            'tanggal' => $request->tanggal,
            'kegiatan' => $request->kegiatan,
            'bukti' => $request->bukti,
        ];
        pemeliharaanasset::where('asset', $id)->update($data);
        return redirect()->to('pemeliharaanasset')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pemeliharaanasset::where('asset', $id)->delete();
        return redirect()->to('./pemeliharaanasset')->with('success', 'Berhasil melakukan delete data');
    }
}
