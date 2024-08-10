@extends('layouts.template_default')
@section('title', 'Detail Penunjang')
@section('content')
    <div class="content-wrapper">
        <div class="container mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="text-center">Detail Penunjang</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama_kegiatan">Nama Kegiatan:</label>
                                <p>{{ $penunjang->nama_kegiatan }}</p>
                            </div>

                            <div class="form-group">
                                <label for="lokasi_kegiatan">Lokasi Kegiatan:</label>
                                <p>{{ $penunjang->lokasi_kegiatan }}</p>
                            </div>

                            <div class="form-group">
                                <label for="sk_kegiatan">SK Kegiatan:</label>
                                <p>{{ $penunjang->sk_kegiatan }}</p>
                            </div>

                            <div class="form-group">
                                <label for="tanggal_sk_kegiatan">Tanggal SK Kegiatan:</label>
                                <p>{{ $penunjang->tanggal_sk_kegiatan }}</p>
                            </div>

                            <div class="form-group">
                                <label for="jumlah_sks">Jumlah SKS:</label>
                                <p>{{ $penunjang->jumlah_sks }}</p>
                            </div>

                            <div class="form-group">
                                <label for="dokumen">Dokumen:</label>
                                @if($penunjang->dokumen)
                                    <p><a href="{{ Storage::url($penunjang->dokumen) }}" target="_blank">View Dokumen</a></p>
                                @else
                                    <p>No Dokumen Available</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a href="{{ route('penunjang.index') }}" class="btn btn-secondary">Back</a>
                    <a href="{{ route('penunjang.edit', $penunjang->id) }}" class="btn btn-warning ml-2">Edit</a>
                </div>
            </div>
        </div>
    </div>
@endsection
