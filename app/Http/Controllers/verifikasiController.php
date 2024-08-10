<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class verifikasiController extends Controller
{
    public function ApproveUser(Request $request, $id)

    {
        $data       = array();
        $data['status_keaktifan']   = $request->status_keaktifan;

        User::where('id', $id)->update($data);

        if ($data) {
            toast('Approve Berhasil', 'success');
        } else {
            toast('Gagal Terjadi Kesalahan', 'error');
        }
        return back();
    }

    public function RejectedUser(Request $request, $id)

    {
        $data       = array();
        $data['status_keaktifan']   = $request->status_keaktifan;

        User::where('id', $id)->update($data);

        if ($data) {
            toast('Approve Berhasil', 'success');
        } else {
            toast('Gagal Terjadi Kesalahan', 'error');
        }
        return back();
    }

    public function ApprovePendidikan(Request $request, $id)

    {
        $data       = array();
        $data['status']   = $request->status;

        Pendidikan::where('id', $id)->update($data);

        if ($data) {
            toast('Approve Berhasil', 'success');
        } else {
            toast('Gagal Terjadi Kesalahan', 'error');
        }
        return back();
    }

    public function RejectedPendidikan(Request $request, $id)

    {
        $data       = array();
        $data['status']   = $request->status;

        Pendidikan::where('id', $id)->update($data);

        if ($data) {
            toast('Approve Berhasil', 'success');
        } else {
            toast('Gagal Terjadi Kesalahan', 'error');
        }
        return back();
    }
}
