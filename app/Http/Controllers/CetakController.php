<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Aika;
use App\Models\User;
use App\Models\Penunjang;
use App\Models\Pendidikan;
use App\Models\Penelitian;
use App\Models\Pengabdian;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    public function exportpendidikan()
    {
        $pendidikans = Pendidikan::all();
        $pdf = Pdf::loadView('pages.pendidikan.cetak', compact('pendidikans'))->setPaper('a4', 'landscape');;
        return $pdf->download('pendidikans.pdf');
    }

    public function exportadmin()
    {
        $admins = User::all();
        $pdf = Pdf::loadView('pages.admin.users.cetak', compact('admins'))->setPaper('a2', 'landscape');;
        return $pdf->download('dosen.pdf');
    }

    public function exportpenelitian()
    {
        $penelitians = Penelitian::all();
        $pdf = Pdf::loadView('pages.penelitian.cetak', compact('penelitians'))->setPaper('a4', 'landscape');;
        return $pdf->download('penelitian.pdf');
    }

    public function exportpengabdian()
    {
        $pengabdians = Pengabdian::all();
        $pdf = Pdf::loadView('pages.pengabdian.cetak', compact('pengabdians'))->setPaper('a4', 'landscape');;
        return $pdf->download('pengabdian.pdf');
    }

    public function exportpenunjang()
    {
        $penunjangs = Penunjang::all();
        $pdf = Pdf::loadView('pages.penunjang.cetak', compact('penunjangs'))->setPaper('a4', 'landscape');;
        return $pdf->download('penunjang.pdf');
    }

    public function exportaika()
    {
        $aikas = Aika::all();
        $pdf = Pdf::loadView('pages.aika.cetak', compact('aikas'))->setPaper('a4', 'landscape');;
        return $pdf->download('aika.pdf');
    }
}
