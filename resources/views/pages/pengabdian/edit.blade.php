@extends('layouts.template_default')
@section('title', 'Edit Pengabdian')
@section('content')
    <div class="content-wrapper">
        <div class="container mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="text-center">Edit Pengabdian</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengabdian.update', $pengabdian->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <input type="number" name="user_id" value="{{auth()->user()->id}}" hidden>
                                <div class="form-group">
                                    <label for="nama_kegiatan">Nama Kegiatan:</label>
                                    <input type="text" name="nama_kegiatan" class="form-control" value="{{ $pengabdian->nama_kegiatan }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="lokasi_kegiatan">Lokasi Kegiatan:</label>
                                    <input type="text" name="lokasi_kegiatan" class="form-control" value="{{ $pengabdian->lokasi_kegiatan }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="sk_kegiatan">SK Kegiatan:</label>
                                    <input type="text" name="sk_kegiatan" class="form-control" value="{{ $pengabdian->sk_kegiatan }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_sk_kegiatan">Tanggal SK Kegiatan:</label>
                                    <input type="date" name="tanggal_sk_kegiatan" class="form-control" value="{{ $pengabdian->tanggal_sk_kegiatan }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="jumlah_sks">Jumlah SKS:</label>
                                    <input type="text" name="jumlah_sks" class="form-control" value="{{ $pengabdian->jumlah_sks }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="dokumen">Dokumen:</label>
                                    <input type="file" name="dokumen" class="form-control">
                                    @if($pengabdian->dokumen)
                                    <p><a href="{{ Storage::url($pengabdian->dokumen) }}" target="_blank">View Dokumen</a></p>
                                @endif
                                </div>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('pengabdian.index') }}" class="btn btn-secondary ml-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
