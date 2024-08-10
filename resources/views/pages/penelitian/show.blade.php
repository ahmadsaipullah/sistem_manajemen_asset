@extends('layouts.template_default')
@section('title', 'Detail Penelitian')
@section('content')
    <div class="content-wrapper">
        <div class="container mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="text-center">Detail Penelitian</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama_publikasi">Nama Publikasi:</label>
                                <p>{{ $penelitian->nama_publikasi }}</p>
                            </div>

                            <div class="form-group">
                                <label for="sk_kegiatan">SK Kegiatan:</label>
                                <p>{{ $penelitian->sk_kegiatan }}</p>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_sk_kegiatan">Tanggal SK Kegiatan:</label>
                                <p>{{ $penelitian->tanggal_sk_kegiatan }}</p>
                            </div>

                            <div class="form-group">
                                <label for="jumlah_sks">Jumlah SKS:</label>
                                <p>{{ $penelitian->jumlah_sks }}</p>
                            </div>

                            <div class="form-group">
                                <label for="dokumen">Dokumen:</label>
                                @if($penelitian->dokumen)
                                    <p><a href="{{ Storage::url($penelitian->dokumen) }}" target="_blank">View Dokumen</a></p>
                                @else
                                    <p>No Dokumen Available</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="status">Status:</label>
                                <p>{{ $penelitian->status }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a href="{{ route('penelitian.index') }}" class="btn btn-secondary">Back</a>
                    <a href="{{ route('penelitian.edit', $penelitian->id) }}" class="btn btn-warning ml-2">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
