<?php

namespace App\Http\Controllers;

use App\Models\Penunjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenunjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penunjangs = Penunjang::with('user')->get();
        return view('pages.penunjang.index', compact('penunjangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.penunjang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'nama_kegiatan' => 'required|string|max:255',
            'lokasi_kegiatan' => 'required|string|max:255',
            'sk_kegiatan' => 'required|string|max:255',
            'tanggal_sk_kegiatan' => 'required|date',
            'jumlah_sks' => 'required|string|max:255',
            'dokumen' => 'required|file|mimes:pdf,doc,docx',
        ]);

        $data = $request->all();
        if ($request->dokumen) {
            $data['dokumen'] = $request->file('dokumen')->store('asset/penunjang', 'public');
        }

        Penunjang::create($data);

        if ($data) {
            toast('Data berhasil ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return redirect()->route('penunjang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penunjang = Penunjang::findOrFail($id);
        return view('pages.penunjang.show', compact('penunjang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penunjang = Penunjang::findOrFail($id);
        return view('pages.penunjang.edit', compact('penunjang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required',
            'nama_kegiatan' => 'required|string|max:255',
            'lokasi_kegiatan' => 'required|string|max:255',
            'sk_kegiatan' => 'required|string|max:255',
            'tanggal_sk_kegiatan' => 'required|date',
            'jumlah_sks' => 'required|string|max:255',
            'dokumen' => 'nullabe|file|mimes:pdf,doc,docx',
        ]);

        $penunjang = Penunjang::findOrFail($id);
        $dataId = $penunjang->find($penunjang->id);
        $data = $request->all();

        if ($request->dokumen) {
            Storage::delete('public/' . $dataId->dokumen);
            $data['dokumen'] = $request->file('dokumen')->store('asset/penunjang', 'public');
        }

        $dataId->update($data);

        if ($data) {
            toast('Data berhasil ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return redirect()->route('penunjang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
