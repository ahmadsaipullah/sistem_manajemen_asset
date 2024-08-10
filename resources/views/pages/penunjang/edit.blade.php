@extends('layouts.template_default')
@section('title', 'Edit Penunjang')
@section('content')
    <div class="content-wrapper">
        <div class="container mt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="text-center">Edit Penunjang</h3>
                </div>
                <form action="{{ route('penunjang.update', $penunjang->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="number" name="user_id" value="{{auth()->user()->id}}" hidden>
                                <div class="form-group">
                                    <label for="nama_kegiatan">Nama Kegiatan</label>
                                    <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror"
                                           id="nama_kegiatan" name="nama_kegiatan" placeholder="Nama Kegiatan" value="{{ old('nama_kegiatan', $penunjang->nama_kegiatan) }}" required/>
                                    @error('nama_kegiatan')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="lokasi_kegiatan">Lokasi Kegiatan</label>
                                    <input type="text" class="form-control @error('lokasi_kegiatan') is-invalid @enderror"
                                           id="lokasi_kegiatan" name="lokasi_kegiatan" placeholder="Lokasi Kegiatan" value="{{ old('lokasi_kegiatan', $penunjang->lokasi_kegiatan) }}" required/>
                                    @error('lokasi_kegiatan')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="sk_kegiatan">SK Kegiatan</label>
                                    <input type="text" class="form-control @error('sk_kegiatan') is-invalid @enderror"
                                           id="sk_kegiatan" name="sk_kegiatan" placeholder="SK Kegiatan" value="{{ old('sk_kegiatan', $penunjang->sk_kegiatan) }}" required/>
                                    @error('sk_kegiatan')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_sk_kegiatan">Tanggal SK Kegiatan</label>
                                    <input type="date" class="form-control @error('tanggal_sk_kegiatan') is-invalid @enderror"
                                           id="tanggal_sk_kegiatan" name="tanggal_sk_kegiatan" value="{{ old('tanggal_sk_kegiatan', $penunjang->tanggal_sk_kegiatan) }}" required/>
                                    @error('tanggal_sk_kegiatan')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="jumlah_sks">Jumlah SKS</label>
                                    <input type="text" class="form-control @error('jumlah_sks') is-invalid @enderror"
                                           id="jumlah_sks" name="jumlah_sks" placeholder="Jumlah SKS" value="{{ old('jumlah_sks', $penunjang->jumlah_sks) }}" required/>
                                    @error('jumlah_sks')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="dokumen">Dokumen</label>
                                    <input type="file" class="form-control @error('dokumen') is-invalid @enderror"
                                           id="dokumen" name="dokumen"/>
                                    @error('dokumen')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                @if($penunjang->dokumen)
                                    <p><a href="{{ Storage::url($penunjang->dokumen) }}" target="_blank">Current Dokumen</a></p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
