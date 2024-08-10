<?php

namespace App\Http\Controllers;

use App\Models\Aika;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AikaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->level_id == 1) {
            $aikas = Aika::with('user')->get();
        } else {
            $aikas = Aika::with('user')->where('user_id', Auth::user()->id)->get();
        }
        return view('pages.aika.index', compact('aikas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.aika.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'nbm' => 'required|string',
            'nama_kegiatan' => 'required|string',
            'lokasi_kegiatan' => 'required|string',
            'sk_kegiatan' => 'required|string',
            'tanggal_sk_kegiatan' => 'required|date',
            'jumlah_sks' => 'required|string',
            'dokumen' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $data = $request->all();
        if ($request->dokumen) {
            $data['dokumen'] = $request->file('dokumen')->store('asset/aika', 'public');
        }
        Aika::create($data);

        if ($data) {
            toast('Data berhasil ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return redirect()->route('aika.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aika = Aika::findOrFail($id);
        return view('pages.aika.show', compact('aika'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aika = Aika::findOrFail($id);
        return view('pages.aika.edit', compact('aika'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required',
            'nbm' => 'required|string',
            'nama_kegiatan' => 'required|string',
            'lokasi_kegiatan' => 'required|string',
            'sk_kegiatan' => 'required|string',
            'tanggal_sk_kegiatan' => 'required|date',
            'jumlah_sks' => 'required|string',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx',
        ]);

        $aika = Aika::findOrFail($id);
        $dataId = $aika->find($aika->id);
        $data = $request->all();

        if ($request->dokumen) {
            Storage::delete('public/' . $dataId->dokumen);
            $data['dokumen'] = $request->file('dokumen')->store('asset/aika', 'public');
        }

        $dataId->update($data);

        if ($data) {
            toast('Data berhasil ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return redirect()->route('aika.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
