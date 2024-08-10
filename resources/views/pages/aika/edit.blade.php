@extends('layouts.template_default')
@section('title', 'Edit Aika')
@section('content')
    <div class="content-wrapper">
        <div class="container mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="text-center">Edit Aika</h3>
                </div>
                <form action="{{ route('aika.update', $aika->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

                                <input type="number" name="user_id" value="{{auth()->user()->id}}" hidden>
                                <div class="form-group">
                                    <label for="nbm">NBM:</label>
                                    <input type="text" name="nbm" id="nbm" class="form-control" value="{{ $aika->nbm }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="nama_kegiatan">Nama Kegiatan:</label>
                                    <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" value="{{ $aika->nama_kegiatan }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="lokasi_kegiatan">Lokasi Kegiatan:</label>
                                    <input type="text" name="lokasi_kegiatan" id="lokasi_kegiatan" class="form-control" value="{{ $aika->lokasi_kegiatan }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="sk_kegiatan">SK Kegiatan:</label>
                                    <input type="text" name="sk_kegiatan" id="sk_kegiatan" class="form-control" value="{{ $aika->sk_kegiatan }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_sk_kegiatan">Tanggal SK Kegiatan:</label>
                                    <input type="date" name="tanggal_sk_kegiatan" id="tanggal_sk_kegiatan" class="form-control" value="{{ $aika->tanggal_sk_kegiatan }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="jumlah_sks">Jumlah SKS:</label>
                                    <input type="text" name="jumlah_sks" id="jumlah_sks" class="form-control" value="{{ $aika->jumlah_sks }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="dokumen">Dokumen:</label>
                                    <input type="file" name="dokumen" id="dokumen" class="form-control">
                                    @if($aika->dokumen)
                                        <p>Current Dokumen: <a href="{{ Storage::url($aika->dokumen) }}" target="_blank">View Dokumen</a></p>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ route('aika.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary ml-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
