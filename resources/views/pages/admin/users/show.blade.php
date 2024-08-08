@extends('layouts.template_default')
@section('title', 'Detail Admin')
@section('content')
    <div class="content-wrapper">
        <div class="container mt-4">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="text-center">Detail Admin</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <!-- Image at the center top -->
                        <div class="col-12 d-flex justify-content-center mb-4">
                            <div class="text-center">
                                @if ($admin->image)
                                    <img src="{{ Storage::url($admin->image) }}" alt="gambar"
                                         style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;" class="img-fluid">
                                @else
                                    <img src="{{ asset('assets/img/user_default.png') }}" alt="image"
                                         style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;" class="img-fluid">
                                @endif
                            </div>
                        </div>

                        <!-- Grid layout for other data -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" value="{{ $admin->name }}" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control" id="nip" value="{{ $admin->nip }}" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="nidn">NIDN</label>
                                <input type="text" class="form-control" id="nidn" value="{{ $admin->nidn }}" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">Nomor Handphone</label>
                                <input type="text" class="form-control" id="no_hp" value="{{ $admin->no_hp }}" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" value="{{ $admin->email }}" readonly/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="level_id">Level User</label>
                                <input type="text" class="form-control" id="level_id" value="{{ $admin->level->level }}" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="fakultas">Fakultas</label>
                                <input type="text" class="form-control" id="fakultas" value="{{ $admin->fakultas }}" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="prodi">Prodi</label>
                                <input type="text" class="form-control" id="prodi" value="{{ $admin->prodi }}" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="status_dosen">Status Dosen</label>
                                <input type="text" class="form-control" id="status_dosen" value="{{ $admin->status_dosen }}" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="jabatan_fungsional">Jabatan Fungsional</label>
                                <input type="text" class="form-control" id="jabatan_fungsional" value="{{ $admin->jabatan_fungsional }}" readonly/>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" value="{{ $admin->jabatan }}" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="status_serdos">Status Serdos</label>
                                <input type="text" class="form-control" id="status_serdos" value="{{ $admin->status_serdos }}" readonly/>
                            </div>
                            <div class="form-group">
                                <label for="status_keaktifan">Status Keaktifan</label>
                                <input type="text" class="form-control" id="status_keaktifan" value="{{ $admin->status_keaktifan }}" readonly/>
                            </div>
                        </div>

                        <!-- Dokumen PDF section moved to the bottom -->
                        <div class="col-12 mt-4">
                            <div class="form-group">
                                <label for="dokumen">Dokumen (PDF)</label>
                                @if($admin->dokumen)
                                    <a href="{{ Storage::url($admin->dokumen) }}" target="_blank" class="btn btn-primary">Lihat Dokumen</a>
                                @else
                                    <p class="text-muted">Tidak ada dokumen yang diupload</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
