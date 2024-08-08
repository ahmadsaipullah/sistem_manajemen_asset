@extends('layouts.template_default')
@section('title', 'Update Admin')
@section('content')
    <div class="content-wrapper">
        <div class="container mt-4">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="text-center">Update Admin</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name" name="name" placeholder="Name" value="{{ old('name') ?? $admin->name }}" required/>
                                    @error('name')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" class="form-control @error('nip') is-invalid @enderror"
                                           id="nip" name="nip" placeholder="NIP" value="{{ old('nip') ?? $admin->nip }}" required/>
                                    @error('nip')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nidn">NIDN</label>
                                    <input type="text" class="form-control @error('nidn') is-invalid @enderror"
                                           id="nidn" name="nidn" placeholder="NIDN" value="{{ old('nidn') ?? $admin->nidn }}" required/>
                                    @error('nidn')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">Nomor Handphone</label>
                                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                           id="no_hp" name="no_hp" placeholder="Nomor Handphone" value="{{ old('no_hp') ?? $admin->no_hp }}" required/>
                                    @error('no_hp')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           id="email" name="email" placeholder="Email" value="{{ old('email') ?? $admin->email }}" required/>
                                    @error('email')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                           id="password" name="password" placeholder="Password" value="{{ old('password') ?? $admin->password }}" required />
                                    @error('password')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="level_id">Level User</label>
                                    <select class="form-control" id="level_id" name="level_id">
                                        <option value="{{ $admin->level_id }}" selected>{{ $admin->level->level }}</option>
                                        @foreach ($levels as $level)
                                            <option value="{{ $level->id }}">{{ $level->level }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="fakultas">Fakultas</label>
                                    <input type="text" class="form-control @error('fakultas') is-invalid @enderror"
                                           id="fakultas" name="fakultas" placeholder="Fakultas" value="{{ old('fakultas') ?? $admin->fakultas }}" />
                                    @error('fakultas')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="prodi">Prodi</label>
                                    <input type="text" class="form-control @error('prodi') is-invalid @enderror"
                                           id="prodi" name="prodi" placeholder="Prodi" value="{{ old('prodi') ?? $admin->prodi }}" />
                                    @error('prodi')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status_dosen">Status Dosen</label>
                                    <input type="text" class="form-control @error('status_dosen') is-invalid @enderror"
                                           id="status_dosen" name="status_dosen" placeholder="Status Dosen" value="{{ old('status_dosen') ?? $admin->status_dosen }}" />
                                    @error('status_dosen')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jabatan_fungsional">Jabatan Fungsional</label>
                                    <input type="text" class="form-control @error('jabatan_fungsional') is-invalid @enderror"
                                           id="jabatan_fungsional" name="jabatan_fungsional" placeholder="Jabatan Fungsional" value="{{ old('jabatan_fungsional') ?? $admin->jabatan_fungsional }}" />
                                    @error('jabatan_fungsional')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                           id="jabatan" name="jabatan" placeholder="Jabatan" value="{{ old('jabatan') ?? $admin->jabatan }}" />
                                    @error('jabatan')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status_serdos">Status Serdos</label>
                                    <input type="text" class="form-control @error('status_serdos') is-invalid @enderror"
                                           id="status_serdos" name="status_serdos" placeholder="Status Serdos" value="{{ old('status_serdos') ?? $admin->status_serdos }}" />
                                    @error('status_serdos')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status_keaktifan">Status Keaktifan</label>
                                    <input type="text" class="form-control @error('status_keaktifan') is-invalid @enderror"
                                           id="status_keaktifan" name="status_keaktifan" placeholder="Status Keaktifan" value="{{ old('status_keaktifan') ?? $admin->status_keaktifan }}" />
                                    @error('status_keaktifan')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="dokumen">Upload Dokumen (PDF)</label>
                                    <input type="file" name="dokumen" id="dokumen" class="form-control @error('dokumen') is-invalid @enderror">
                                    @error('dokumen')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    @if ($admin->image)
                                        <img src="{{ Storage::url($admin->image) }}" alt="gambar"
                                             style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%;" class="img-fluid">
                                    @else
                                        <img src="{{ asset('assets/img/user_default.png') }}" alt="image"
                                             style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%;" class="img-fluid">
                                    @endif
                                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
