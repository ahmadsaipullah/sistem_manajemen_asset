@extends('layouts.template_default')
@section('title', 'Create Penelitian')
@section('content')
    <div class="content-wrapper">
        <div class="container mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="text-center">Create Penelitian</h3>
                </div>
                <form action="{{ route('penelitian.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <input type="number" name="user_id" value="{{auth()->user()->id}}" hidden>
                        <div class="form-group">
                            <label for="nama_publikasi">Nama Publikasi</label>
                            <input type="text" class="form-control @error('nama_publikasi') is-invalid @enderror" id="nama_publikasi" name="nama_publikasi" placeholder="Nama Publikasi" value="{{ old('nama_publikasi') }}" required />
                            @error('nama_publikasi')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sk_kegiatan">SK Kegiatan</label>
                            <input type="text" class="form-control @error('sk_kegiatan') is-invalid @enderror" id="sk_kegiatan" name="sk_kegiatan" placeholder="SK Kegiatan" value="{{ old('sk_kegiatan') }}" required />
                            @error('sk_kegiatan')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_sk_kegiatan">Tanggal SK Kegiatan</label>
                            <input type="date" class="form-control @error('tanggal_sk_kegiatan') is-invalid @enderror" id="tanggal_sk_kegiatan" name="tanggal_sk_kegiatan" value="{{ old('tanggal_sk_kegiatan') }}" required />
                            @error('tanggal_sk_kegiatan')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jumlah_sks">Jumlah SKS</label>
                            <input type="text" class="form-control @error('jumlah_sks') is-invalid @enderror" id="jumlah_sks" name="jumlah_sks" placeholder="Jumlah SKS" value="{{ old('jumlah_sks') }}" required />
                            @error('jumlah_sks')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="dokumen">Dokumen</label>
                            <input type="file" class="form-control @error('dokumen') is-invalid @enderror" id="dokumen" name="dokumen" required />
                            @error('dokumen')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
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
