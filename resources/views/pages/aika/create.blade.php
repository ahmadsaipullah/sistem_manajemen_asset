@extends('layouts.template_default')
@section('title', 'Tambah Aika')
@section('content')
    <div class="content-wrapper">
        <div class="container mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="text-center">Tambah Aika</h3>
                </div>
                <form action="{{ route('aika.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="number" name="user_id" value="{{auth()->user()->id}}" hidden>
                                <div class="form-group">
                                    <label for="nbm">NBM:</label>
                                    <input type="text" class="form-control" id="nbm" name="nbm" value="{{ old('nbm') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_kegiatan">Nama Kegiatan:</label>
                                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="{{ old('nama_kegiatan') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="lokasi_kegiatan">Lokasi Kegiatan:</label>
                                    <input type="text" class="form-control" id="lokasi_kegiatan" name="lokasi_kegiatan" value="{{ old('lokasi_kegiatan') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="sk_kegiatan">SK Kegiatan:</label>
                                    <input type="text" class="form-control" id="sk_kegiatan" name="sk_kegiatan" value="{{ old('sk_kegiatan') }}" required>
                                </div>



                                <div class="form-group">
                                    <label for="tanggal_sk_kegiatan">Tanggal SK Kegiatan:</label>
                                    <input type="date" class="form-control" id="tanggal_sk_kegiatan" name="tanggal_sk_kegiatan" value="{{ old('tanggal_sk_kegiatan') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_sks">Jumlah SKS:</label>
                                    <input type="text" class="form-control" id="jumlah_sks" name="jumlah_sks" value="{{ old('jumlah_sks') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="dokumen">Dokumen:</label>
                                    <input type="file" class="form-control" id="dokumen" name="dokumen" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
