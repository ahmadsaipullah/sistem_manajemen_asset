@extends('layouts.template_default')
@section('title', 'Halaman Aika')
@section('aika','active')
@section('content')
    <div class="content-wrapper">
        @include('sweetalert::alert')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Halaman Aika</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Halaman Aika</li>
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
                                <a class="btn btn-primary" href="{{route('aika.create')}}"><i class="fa fa-plus"></i> Tambah Aika</a>
                                <a class="btn btn-danger" href="{{ route('aika.pdf') }}"><i class="fa fa-file-pdf"></i> Export PDF</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="Table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>User</th>
                                            <th>NBM</th>
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
                                        @forelse ($aikas as $aika)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $aika->user->name }}</td>
                                                <td>{{ $aika->nbm }}</td>
                                                <td>{{ $aika->nama_kegiatan }}</td>
                                                <td>{{ $aika->lokasi_kegiatan }}</td>
                                                <td>{{ $aika->sk_kegiatan }}</td>
                                                <td>{{ $aika->tanggal_sk_kegiatan }}</td>
                                                <td>{{ $aika->jumlah_sks }}</td>
                                                <td>
                                                    <a href="{{ Storage::url($aika->dokumen) }}" target="_blank">View Dokumen</a>
                                                </td>
                                                <td>
                                                    @if($aika->status == 'Pending')
                                                        <span class="badge badge-warning">{{ $aika->status }}</span>
                                                    @elseif($aika->status == 'Approved')
                                                        <span class="badge badge-success">{{ $aika->status }}</span>
                                                    @elseif($aika->status == 'Rejected')
                                                        <span class="badge badge-danger">{{ $aika->status }}</span>
                                                    @endif
                                                </td>
                                                @if (Auth::user()->level_id == 1)
                                                <td>
                                                    <div class="d-flex">

                                                        <form action="{{route('approve.aika', $aika->id)}}" method="post">
                                                            @csrf
                                                            <input name="status"
                                                            id="status" type="hidden" value="Approved">
                                                            <button class="btn btn-xs  btn-success"
                                                            type="submit">Approve</button>
                                                        </form>
                                                        |
                                                        <form action="{{route('rejected.aika', $aika->id)}}" method="post">
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
                                                        <a href="{{ route('aika.edit', $aika->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                                            <i class="fa fa-pen"></i>
                                                        </a>

                                                        <a href="{{ route('aika.show', $aika->id) }}" class="btn btn-primary btn-sm" title="View">
                                                            <i class="fa fa-eye"></i>
                                                        </a>

                                                        {{-- <form action="{{ route('aika.destroy', $aika->id) }}" method="post" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this item?');">
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
