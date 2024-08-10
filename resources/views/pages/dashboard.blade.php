@extends('layouts.template_default')
@section('title', 'Dashboard')
@section('dashboard', 'active ')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Selamat Datang, <span class="btn btn-xs btn-success font-italic">{{ auth()->user()->name }}</span> Di Sistem Manajemen Asset UMT</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
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
                                <h1 class="text-center text-bold">SISTEM MANAJEMEN ASSET</h1>
                            </div>
                @endif
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
