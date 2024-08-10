<?php

namespace App\Http\Controllers;

use App\Models\Penelitian;
use Illuminate\Http\Request;

class PenelitianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penelitians = Penelitian::with('user')->get();
        return view('pages.penelitian.index', compact('penelitians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.penelitian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_publikasi' => 'required|string|max:255',
            'sk_kegiatan' => 'required|string|max:255',
            'tanggal_sk_kegiatan' => 'required|date',
            'jumlah_sks' => 'required|string|max:255',
            'dokumen' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $data = $request->all();
        if ($request->dokumen) {
            $data['dokumen'] = $request->file('dokumen')->store('asset/penelitian', 'public');
        }
        Penelitian::create($data);

        if ($data) {
            toast('Data berhasil ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return redirect()->route('penelitian.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penelitian = Penelitian::findOrFail($id);
        return view('pages.penelitian.show', compact('penelitian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penelitian = Penelitian::findOrFail($id);
        return view('pages.penelitian.edit', compact('penelitian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_publikasi' => 'required|string|max:255',
            'sk_kegiatan' => 'required|string|max:255',
            'tanggal_sk_kegiatan' => 'required|date',
            'jumlah_sks' => 'required|string|max:255',
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $penelitian = Penelitian::findOrFail($id);
        $dataId = $penelitian->find($penelitian->id);
        $data = $request->all();

        if ($request->dokumen) {
            Storage::delete('public/' . $dataId->dokumen);
            $data['dokumen'] = $request->file('dokumen')->store('asset/penelitian', 'public');
        }

        $dataId->update($data);

        if ($data) {
            toast('Data berhasil ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return redirect()->route('penelitian.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
