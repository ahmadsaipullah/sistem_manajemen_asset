@extends('layouts.template_default')
@section('title', 'Dashboard')
@section('dashboard', 'active ')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h1 class="m-0">Selamat Datang, <span class="btn btn-xs btn-success font-italic">{{ auth()->user()->name }}</span> Di Sistem Manajemen Asset UMT</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                @if (auth()->user()->level_id == 1)
                    <div class="row">
                        <!-- User Registrations -->
                        <div class="col-lg-2 col-12">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>{{ $user }}</h3>
                                    <p>User Registrations</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="{{ route('admin.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <!-- Pendidikan -->
                        <div class="col-lg-2 col-12">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $pendidikan }}</h3>
                                    <p>Pendidikan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-document-text"></i>
                                </div>
                                <a href="{{ route('pendidikan.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <!-- Penelitian -->
                        <div class="col-lg-2 col-12">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $penelitian }}</h3>
                                    <p>Penelitian</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-eye"></i>
                                </div>
                                <a href="{{ route('penelitian.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <!-- Pengabdian -->
                        <div class="col-lg-2 col-12">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $pengabdian }}</h3>
                                    <p>Pengabdian</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-heart"></i>
                                </div>
                                <a href="{{ route('pengabdian.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <!-- Penunjang -->
                        <div class="col-lg-2 col-12">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $penunjang }}</h3>
                                    <p>Penunjang</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-hammer"></i>
                                </div>
                                <a href="{{ route('penunjang.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <!-- Aika -->
                        <div class="col-lg-2 col-12">
                            <!-- small box -->
                            <div class="small-box bg-purple">
                                <div class="inner">
                                    <h3>{{ $aika }}</h3>
                                    <p>Aika</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-planet"></i>
                                </div>
                                <a href="{{ route('aika.index') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                @else
                <div class="mb-4">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Biodata</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name:</label>
                                                <p>{{ auth()->user()->name }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Email:</label>
                                                <p>{{ auth()->user()->email }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>NIP:</label>
                                                <p>{{ auth()->user()->nip }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>NIDN:</label>
                                                <p>{{ auth()->user()->nidn }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Fakultas:</label>
                                                <p>{{ auth()->user()->fakultas }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Prodi:</label>
                                                <p>{{ auth()->user()->prodi }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Status Dosen:</label>
                                                <p>{{ auth()->user()->status_dosen }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jabatan Fungsional:</label>
                                                <p>{{ auth()->user()->jabatan_fungsional }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Jabatan:</label>
                                                <p>{{ auth()->user()->jabatan }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Status Serdos:</label>
                                                <p>{{ auth()->user()->status_serdos }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>No HP:</label>
                                                <p>{{ auth()->user()->no_hp }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Dokumen:</label>
                                                <p>{{ auth()->user()->dokumen }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Status Keaktifan:</label>
                                                <p>{{ auth()->user()->status_keaktifan }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Dokumen</label>
                                                <p> <a href="{{ Storage::url(auth()->user()->dokumen) }}" target="_blank">View Dokumen</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                @endif
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
