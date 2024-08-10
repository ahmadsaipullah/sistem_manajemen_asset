<?php

namespace App\Http\Controllers\Admin;

use App\Models\Aika;
use App\Models\User;
use App\Models\Penunjang;
use App\Models\Pendidikan;
use App\Models\Penelitian;
use App\Models\Pengabdian;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class dashboardController extends Controller
{
    public function index()
    {

        $user = User::all()->count();
        $pendidikan = Pendidikan::all()->count();
        $penunjang = Penunjang::all()->count();
        $pengabdian = Pengabdian::all()->count();
        $penelitian = Penelitian::all()->count();
        $aika = Aika::all()->count();
        return view('pages.dashboard', compact('user','pendidikan','penelitian','penunjang','pengabdian','aika'));
    }

    public function error()
    {
        return view('error.401');
    }



}
