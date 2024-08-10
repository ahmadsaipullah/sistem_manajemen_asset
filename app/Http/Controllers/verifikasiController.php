<?php

namespace App\Http\Controllers;

use App\Models\Aika;
use App\Models\User;
use App\Models\Penunjang;
use App\Models\Pendidikan;
use App\Models\Penelitian;
use App\Models\Pengabdian;
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

    public function ApprovePenelitian(Request $request, $id)

    {
        $data       = array();
        $data['status']   = $request->status;

        Penelitian::where('id', $id)->update($data);

        if ($data) {
            toast('Approve Berhasil', 'success');
        } else {
            toast('Gagal Terjadi Kesalahan', 'error');
        }
        return back();
    }

    public function RejectedPenelitian(Request $request, $id)

    {
        $data       = array();
        $data['status']   = $request->status;

        Penelitian::where('id', $id)->update($data);

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
    public function ApprovePengabdian(Request $request, $id)

    {
        $data       = array();
        $data['status']   = $request->status;

        Pengabdian::where('id', $id)->update($data);

        if ($data) {
            toast('Approve Berhasil', 'success');
        } else {
            toast('Gagal Terjadi Kesalahan', 'error');
        }
        return back();
    }

    public function RejectedPengabdian(Request $request, $id)

    {
        $data       = array();
        $data['status']   = $request->status;

        Pengabdian::where('id', $id)->update($data);

        if ($data) {
            toast('Approve Berhasil', 'success');
        } else {
            toast('Gagal Terjadi Kesalahan', 'error');
        }
        return back();
    }
    public function ApprovePenunjang(Request $request, $id)

    {
        $data       = array();
        $data['status']   = $request->status;

        Penunjang::where('id', $id)->update($data);

        if ($data) {
            toast('Approve Berhasil', 'success');
        } else {
            toast('Gagal Terjadi Kesalahan', 'error');
        }
        return back();
    }

    public function RejectedPenunjang(Request $request, $id)

    {
        $data       = array();
        $data['status']   = $request->status;

        Penunjang::where('id', $id)->update($data);

        if ($data) {
            toast('Approve Berhasil', 'success');
        } else {
            toast('Gagal Terjadi Kesalahan', 'error');
        }
        return back();
    }
    public function ApproveAika(Request $request, $id)

    {
        $data       = array();
        $data['status']   = $request->status;

        Aika::where('id', $id)->update($data);

        if ($data) {
            toast('Approve Berhasil', 'success');
        } else {
            toast('Gagal Terjadi Kesalahan', 'error');
        }
        return back();
    }

    public function RejectedAika(Request $request, $id)

    {
        $data       = array();
        $data['status']   = $request->status;

        Aika::where('id', $id)->update($data);

        if ($data) {
            toast('Approve Berhasil', 'success');
        } else {
            toast('Gagal Terjadi Kesalahan', 'error');
        }
        return back();
    }
}
