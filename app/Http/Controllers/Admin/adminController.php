<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::with(['Level'])->get();
        return view('pages.admin.users.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $levels = Level::all();
        return view('pages.admin.users.create', compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email:dns', 'max:255', 'unique:users'],
            'password' => ['required', 'min:6'],
            'level_id' => ['required','integer'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => hash::make($request->password),
            'level_id' => $request->level_id
        ];

        User::create($data);
        if ($data) {
            toast('Data berhasil ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mengambil data admin berdasarkan ID
        $admin = User::with(['level'])->findOrFail($id);

        // Mengirim data admin ke view 'admin.show'
        return view('pages.admin.users.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $levels = level::all();
        $admin = User::with('Level')->findOrFail($id);
        return view('pages.admin.users.edit', compact('levels', 'admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:255', 'unique:users,nip,' . $id],
            'nidn' => ['required', 'string', 'max:255', 'unique:users,nidn,' . $id],
            'no_hp' => ['required', 'string', 'max:13'],
            'email' => ['required', 'string', 'lowercase', 'email:dns', 'max:255', 'unique:users,email,' . $id],
            'password' => ['required', 'string', 'min:6'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'fakultas' => ['nullable', 'string', 'max:255'],
            'prodi' => ['nullable', 'string', 'max:255'],
            'status_dosen' => ['nullable', 'string', 'max:255'],
            'jabatan_fungsional' => ['nullable', 'string', 'max:255'],
            'jabatan' => ['nullable', 'string', 'max:255'],
            'status_serdos' => ['nullable', 'string', 'max:255'],
            'status_keaktifan' => ['nullable', 'string', 'max:255'],
            'level_id' => ['required', 'exists:levels,id'],
            'dokumen' => ['nullable', 'file', 'mimes:pdf', 'max:2048']
        ]);


        $admin = User::findOrFail($id);
        $dataId = $admin->find($admin->id);
        $data = $request->all();
        if ($request->image) {
            Storage::delete('public/' . $dataId->image);
            $data['image'] = $request->file('image')->store('asset/admin', 'public');
        }

        if ($request->dokumen) {
            Storage::delete('public/' . $dataId->dokumen);
            $data['dokumen'] = $request->file('dokumen')->store('asset/file', 'public');
        }

        $dataId->update($data);

        if ($data) {
            toast('Data berhasil diupdate', 'success');
        } else {
            toast('Data Gagal Diupdate', 'error');
        }
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = User::findOrFail($id);
        Storage::delete('public/' . $admin->image);
        $admin->delete();
        if ($admin) {
            toast('Data berhasil dihapus', 'success');
        } else {
            toast('Terjadi Kesalahan', 'error');
        }
        return redirect()->route('admin.index');
    }
}
