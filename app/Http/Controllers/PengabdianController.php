<?php

namespace App\Http\Controllers;

use App\Models\Pengabdian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengabdianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->level_id == 1) {
            $pengabdians = Pengabdian::with('user')->get();
        } else {
            $pengabdians = Pengabdian::with('user')->where('user_id', Auth::user()->id)->get();
        }
        return view('pages.pengabdian.index', compact('pengabdians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pengabdian.create');
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
            'dokumen' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $data = $request->all();
        if ($request->dokumen) {
            $data['dokumen'] = $request->file('dokumen')->store('asset/pengabdian', 'public');
        }

        Pengabdian::create($data);

        if ($data) {
            toast('Data berhasil ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return redirect()->route('pengabdian.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengabdian = Pengabdian::findOrFail($id);
        return view('pages.pengabdian.show', compact('pengabdian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengabdian = Pengabdian::findOrFail($id);
        return view('pages.pengabdian.edit', compact('pengabdian'));
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
            'dokumen' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $pengabdian = Pengabdian::findOrFail($id);
        $dataId = $pengabdian->find($pengabdian->id);
        $data = $request->all();

        if ($request->dokumen) {
            Storage::delete('public/' . $dataId->dokumen);
            $data['dokumen'] = $request->file('dokumen')->store('asset/pengabdian', 'public');
        }

        $dataId->update($data);

        if ($data) {
            toast('Data berhasil ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return redirect()->route('pengabdian.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
