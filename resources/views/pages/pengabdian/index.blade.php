@extends('layouts.template_default')
@section('title', 'Halaman Pengabdian')
@section('pengabdian','active')
@section('content')
    <div class="content-wrapper">
        @include('sweetalert::alert')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Halaman Pengabdian</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Halaman Pengabdian</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="btn btn-primary" href="{{route('pengabdian.create')}}"><i class="fa fa-plus"></i> Tambah Pengabdian</a>
                                <a class="btn btn-danger" href="#"><i class="fa fa-file-pdf"></i> Export PDF</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="Table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>User</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Lokasi Kegiatan</th>
                                            <th>SK Kegiatan</th>
                                            <th>Tanggal SK Kegiatan</th>
                                            <th>Jumlah SKS</th>
                                            <th>Status</th>
                                            <th>Dokumen</th>
                                            @if (Auth::user()->level_id == 1)
                                            <th>Verifikasi</th>
                                            @endif
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pengabdians as $pengabdian)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pengabdian->user->name }}</td>
                                                <td>{{ $pengabdian->nama_kegiatan }}</td>
                                                <td>{{ $pengabdian->lokasi_kegiatan }}</td>
                                                <td>{{ $pengabdian->sk_kegiatan }}</td>
                                                <td>{{ $pengabdian->tanggal_sk_kegiatan }}</td>
                                                <td>{{ $pengabdian->jumlah_sks }}</td>

                                                <td>
                                                    @if($pengabdian->status == 'Pending')
                                                        <span class="badge badge-warning">{{ $pengabdian->status }}</span>
                                                    @elseif($pengabdian->status == 'Approved')
                                                        <span class="badge badge-success">{{ $pengabdian->status }}</span>
                                                    @elseif($penunjang->status == 'Rejected')
                                                        <span class="badge badge-danger">{{ $pengabdian->status }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ Storage::url($pengabdian->dokumen) }}" target="_blank">View Dokumen</a>
                                                </td>
                                                @if (Auth::user()->level_id == 1)
                                                <td>
                                                    <div class="d-flex">

                                                        <form action="{{route('approve.pengabdian', $pengabdian->id)}}" method="post">
                                                            @csrf
                                                            <input name="status"
                                                            id="status" type="hidden" value="Approved">
                                                            <button class="btn btn-xs  btn-success"
                                                            type="submit">Approve</button>
                                                        </form>
                                                        |
                                                        <form action="{{route('rejected.pengabdian', $pengabdian->id)}}" method="post">
                                                            @csrf
                                                            <input name="status"
                                                            id="status" type="hidden" value="Rejected">
                                                            <button class="btn btn-xs  btn-danger"
                                                            type="submit">Rejected</button>
                                                        </form>

                                                    </div>

                                                </td>
                                                @endif
                                                <td>
                                                    <div class="text-center d-flex justify-content-between">
                                                        <a href="{{ route('pengabdian.edit', $pengabdian->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                                            <i class="fa fa-pen"></i>
                                                        </a>

                                                        <a href="{{ route('pengabdian.show', $pengabdian->id) }}" class="btn btn-primary btn-sm" title="View">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="11" class="text-center p-5">Data Kosong</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
