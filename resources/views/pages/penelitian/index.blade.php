@extends('layouts.template_default')
@section('title', 'Halaman Penelitian')
@section('penelitian', 'active')
@section('content')
    <div class="content-wrapper">
        @include('sweetalert::alert')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Halaman Penelitian</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Halaman Penelitian</li>
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
                                <a class="btn btn-primary" href="{{ route('penelitian.create') }}"><i class="fa fa-plus"></i> Tambah Penelitian</a>
                                <a class="btn btn-danger" href="#"><i class="fa fa-file-pdf"></i> Export PDF</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="Table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>User</th>
                                            <th>Nama Publikasi</th>
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
                                        @forelse ($penelitians as $penelitian)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $penelitian->user->name }}</td>
                                                <td>{{ $penelitian->nama_publikasi }}</td>
                                                <td>{{ $penelitian->sk_kegiatan }}</td>
                                                <td>{{ $penelitian->tanggal_sk_kegiatan }}</td>
                                                <td>{{ $penelitian->jumlah_sks }}</td>
                                                <td>
                                                    @if($penelitian->status == 'Pending')
                                                        <span class="badge badge-warning">{{ $penelitian->status }}</span>
                                                    @elseif($penelitian->status == 'Approved')
                                                        <span class="badge badge-success">{{ $penelitian->status }}</span>
                                                    @elseif($penelitian->status == 'Rejected')
                                                        <span class="badge badge-danger">{{ $penelitian->status }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ Storage::url($penelitian->dokumen) }}" target="_blank">View Dokumen</a>
                                                </td>
                                                @if (Auth::user()->level_id == 1)
                                                <td>
                                                    <div class="d-flex">

                                                        <form action="{{route('approve.penelitian', $penelitian->id)}}" method="post">
                                                            @csrf
                                                            <input name="status"
                                                            id="status" type="hidden" value="Approved">
                                                            <button class="btn btn-xs  btn-success"
                                                            type="submit">Approve</button>
                                                        </form>
                                                        |
                                                        <form action="{{route('rejected.penelitian', $penelitian->id)}}" method="post">
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
                                                        <a href="{{ route('penelitian.edit', $penelitian->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                                            <i class="fa fa-pen"></i>
                                                        </a>

                                                        <a href="{{ route('penelitian.show', $penelitian->id) }}" class="btn btn-primary btn-sm" title="View">
                                                            <i class="fa fa-eye"></i>
                                                        </a>

                                                        {{-- <form action="{{ route('penelitian.destroy', $penelitian->id) }}" method="post" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this item?');">
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
                                            <td colspan="12" class="text-center p-5">Data Kosong</td>
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
