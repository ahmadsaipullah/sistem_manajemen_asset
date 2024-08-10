@extends('layouts.template_default')
@section('title', 'Detail Pendidikan')
@section('content')
    <div class="content-wrapper">
        <div class="container mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="text-center">Detail Pendidikan</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama_kegiatan">Nama Kegiatan:</label>
                                <p>{{ $pendidikan->nama_kegiatan }}</p>
                            </div>

                            <div class="form-group">
                                <label for="lokasi_kegiatan">Lokasi Kegiatan:</label>
                                <p>{{ $pendidikan->lokasi_kegiatan }}</p>
                            </div>

                            <div class="form-group">
                                <label for="sk_kegiatan">SK Kegiatan:</label>
                                <p>{{ $pendidikan->sk_kegiatan }}</p>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_sk_kegiatan">Tanggal SK Kegiatan:</label>
                                <p>{{ $pendidikan->tanggal_sk_kegiatan }}</p>
                            </div>

                            <div class="form-group">
                                <label for="jumlah_sks">Jumlah SKS:</label>
                                <p>{{ $pendidikan->jumlah_sks }}</p>
                            </div>

                            <div class="form-group">
                                <label for="pertemuan">Pertemuan:</label>
                                <p>{{ $pendidikan->pertemuan }}</p>
                            </div>

                            <div class="form-group">
                                <label for="dokumen">Dokumen:</label>
                                @if($pendidikan->dokumen)
                                    <p><a href="{{ Storage::url($pendidikan->dokumen) }}" target="_blank">View Dokumen</a></p>
                                @else
                                    <p>No Dokumen Available</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a href="{{ route('pendidikan.index') }}" class="btn btn-secondary">Back</a>
                    <a href="{{ route('pendidikan.edit', $pendidikan->id) }}" class="btn btn-warning ml-2">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
