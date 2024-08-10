@extends('layouts.template_default')
@section('title', 'Tambah Pengabdian')
@section('content')
    <div class="content-wrapper">
        <div class="container mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="text-center">Tambah Pengabdian</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengabdian.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <input type="number" name="user_id" value="{{auth()->user()->id}}" hidden>
                                <div class="form-group">
                                    <label for="nama_kegiatan">Nama Kegiatan:</label>
                                    <input type="text" name="nama_kegiatan" class="form-control" placeholder="Masukkan Nama Kegiatan" required>
                                </div>

                                <div class="form-group">
                                    <label for="lokasi_kegiatan">Lokasi Kegiatan:</label>
                                    <input type="text" name="lokasi_kegiatan" class="form-control" placeholder="Masukkan Lokasi Kegiatan" required>
                                </div>

                                <div class="form-group">
                                    <label for="sk_kegiatan">SK Kegiatan:</label>
                                    <input type="text" name="sk_kegiatan" class="form-control" placeholder="Masukkan SK Kegiatan" required>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_sk_kegiatan">Tanggal SK Kegiatan:</label>
                                    <input type="date" name="tanggal_sk_kegiatan" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="jumlah_sks">Jumlah SKS:</label>
                                    <input type="text" name="jumlah_sks" class="form-control" placeholder="Masukkan Jumlah SKS" required>
                                </div>

                                <div class="form-group">
                                    <label for="dokumen">Dokumen:</label>
                                    <input type="file" name="dokumen" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('pengabdian.index') }}" class="btn btn-secondary ml-2">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
