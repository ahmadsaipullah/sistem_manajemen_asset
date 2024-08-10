@extends('layouts.template_default')
@section('title', 'Halaman Pendidikan')
@section('pendidikan','active')
@section('content')
    <div class="content-wrapper">
        @include('sweetalert::alert')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Halaman Pendidikan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Halaman Pendidikan</li>
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
                                <a class="btn btn-primary" href="{{route('pendidikan.create')}}"><i class="fa fa-plus"></i> Tambah Pendidikan</a>
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
                                            <th>Pertemuan</th>
                                            <th>Dokumen</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pendidikans as $pendidikan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pendidikan->user->name }}</td>
                                                <td>{{ $pendidikan->nama_kegiatan }}</td>
                                                <td>{{ $pendidikan->lokasi_kegiatan }}</td>
                                                <td>{{ $pendidikan->sk_kegiatan }}</td>
                                                <td>{{ $pendidikan->tanggal_sk_kegiatan }}</td>
                                                <td>{{ $pendidikan->jumlah_sks }}</td>
                                                <td>{{ $pendidikan->pertemuan }}</td>
                                                <td>
                                                    <a href="{{ Storage::url($pendidikan->dokumen) }}" target="_blank">View Dokumen</a>
                                                </td>
                                                <td>
                                                    @if($pendidikan->status == 'Pending')
                                                        <span class="badge badge-warning">{{ $pendidikan->status }}</span>
                                                    @elseif($pendidikan->status == 'Approved')
                                                        <span class="badge badge-success">{{ $pendidikan->status }}</span>
                                                    @else
                                                        <span class="badge badge-danger">{{ $pendidikan->status }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="text-center d-flex justify-content-between">
                                                        <a href="{{ route('pendidikan.edit', $pendidikan->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                                            <i class="fa fa-pen"></i>
                                                        </a>

                                                        <a href="{{ route('pendidikan.show', $pendidikan->id) }}" class="btn btn-primary btn-sm" title="View">
                                                            <i class="fa fa-eye"></i>
                                                        </a>

                                                        {{-- <form action="{{ route('pendidikan.destroy', $pendidikan->id) }}" method="post" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger btn-sm" type="submit" title="Delete">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form> --}}
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
