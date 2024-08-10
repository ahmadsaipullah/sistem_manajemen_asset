<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $pendidikans = Pendidikan::with('user')->get();
            return view('pages.pendidikan.index', compact('pendidikans'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pendidikan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'nama_kegiatan' => 'required',
            'lokasi_kegiatan' => 'required',
            'sk_kegiatan' => 'required',
            'tanggal_sk_kegiatan' => 'required|date',
            'jumlah_sks' => 'required',
            'pertemuan' => 'required',
            'dokumen' => ['nullable', 'file', 'mimes:pdf', 'max:2048'],
        ]);


        $data = $request->all();
        if ($request->dokumen) {
            $data['dokumen'] = $request->file('dokumen')->store('asset/pendidikan', 'public');
        }
        Pendidikan::create($data);

        if ($data) {
            toast('Data berhasil ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return redirect()->route('pendidikan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        return view('pages.pendidikan.show', compact('pendidikan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        return view('pages.pendidikan.edit', compact('pendidikan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required',
            'nama_kegiatan' => 'required',
            'lokasi_kegiatan' => 'required',
            'sk_kegiatan' => 'required',
            'tanggal_sk_kegiatan' => 'required|date',
            'jumlah_sks' => 'required',
            'pertemuan' => 'required',
            'dokumen' => ['nullable', 'file', 'mimes:pdf', 'max:2048'],
        ]);

        $pendidikan = Pendidikan::findOrFail($id);
        $dataId = $pendidikan->find($pendidikan->id);
        $data = $request->all();

        if ($request->dokumen) {
            Storage::delete('public/' . $dataId->dokumen);
            $data['dokumen'] = $request->file('dokumen')->store('asset/pendidikan', 'public');
        }

        $dataId->update($data);

        if ($data) {
            toast('Data berhasil ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return redirect()->route('pendidikan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
