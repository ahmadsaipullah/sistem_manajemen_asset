@extends('layouts.template_default')
@section('title', 'Halaman Profile')
@section('admin', 'active')
@section('content')
    <div class="content-wrapper">
        @include('sweetalert::alert')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <h1>Halaman Profile</h1>
                    </div>
                    <div class="col-sm-8">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Halaman Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if (Auth()->user()->image)
                                     <img src="{{ Storage::url(Auth()->user()->image) }}" alt="gambar"
                                     width="120px" style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%;" class="img-fluid">
                                     @else
                                     <img class="profile-user-img img-fluid img-circle" src="{{ asset('assets/img/user_default.png') }}" alt="User profile picture">
                                    @endif
                                </div>
                                <h3 class="profile-username text-center uppercase">{{ auth()->user()->name }}</h3>

                                <p class="text-muted text-center">{{ auth()->user()->nim }}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Email :</b> <a class="float-right">{{ auth()->user()->email }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Nip :</b> <a class="float-right">{{ auth()->user()->nip }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Nidn :</b> <a class="float-right">{{ auth()->user()->nidn }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Fakultas :</b> <a class="float-right">{{ auth()->user()->fakultas }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Prodi :</b> <a class="float-right">{{ auth()->user()->prodi }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Nomor Hp :</b> <a class="float-right">{{ auth()->user()->no_hp }}</a>
                                    </li>

                                    <li class="list-group-item">
                                        <b>Date Account :</b> <a class="float-right">{{ auth()->user()->created_at->isoformat('DD MMMM Y') }}</a>
                                    </li>

                                </ul>

    <p class="btn btn-primary btn-block "></p>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
       <!-- /.col -->
       <div class="col-md-8">
        <div class="card card-primary card-outline">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#updatePassword" data-toggle="tab">Update Password</a></li>
              <li class="nav-item"><a class="nav-link" href="#updateProfile" data-toggle="tab">Update Profile</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="updatePassword">
                <form action="{{ route('profile.updatePassword') }}" method="post" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label for="current_password" class="col-sm-4 col-form-label">Current password</label>
                        <div class="col-sm-8">
                          <input type="password" class="form-control @error('current_password') is invalid

                          @enderror" id="current_password" name="current_password" placeholder="Current password">
                        </div>
                        @error('current_password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                      </div>

                    <div class="form-group row">
                      <label for="password" class="col-sm-4 col-form-label">New password</label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control @error('password') is invalid

                        @enderror" id="password" name="password" placeholder="New password">
                      </div>
                      @error('password')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                    </div>

                    <div class="form-group row">
                      <label for="password_confirmation" class="col-sm-4 col-form-label">Password confirmation</label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control @error('password_confirmation') is invalid

                        @enderror" id="password_confirmation" name="password_confirmation" placeholder="Password confirmation">
                      </div>
                      @error('password_confirmation')
                      <span class="text-danger">{{$message}}</span>
                  @enderror
                    </div>

                    <div class="form-group row">
                      <div class="offset-sm-4 col-sm-8">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" required> I agree to the terms and conditions
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-4 col-sm-8">
                        <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                  </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="updateProfile">
                <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name" name="name" placeholder="Name" value="{{ old('name') ?? $profile->name }}" required/>
                                    @error('name')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" class="form-control @error('nip') is-invalid @enderror"
                                           id="nip" name="nip" placeholder="NIP" value="{{ old('nip') ?? $profile->nip }}" required/>
                                    @error('nip')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nidn">NIDN</label>
                                    <input type="text" class="form-control @error('nidn') is-invalid @enderror"
                                           id="nidn" name="nidn" placeholder="NIDN" value="{{ old('nidn') ?? $profile->nidn }}" required/>
                                    @error('nidn')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">Nomor Handphone</label>
                                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                           id="no_hp" name="no_hp" placeholder="Nomor Handphone" value="{{ old('no_hp') ?? $profile->no_hp }}" required/>
                                    @error('no_hp')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           id="email" name="email" placeholder="Email" value="{{ old('email') ?? $profile->email }}" required/>
                                    @error('email')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status_serdos">Status Serdos</label>
                                    <input type="text" class="form-control @error('status_serdos') is-invalid @enderror"
                                           id="status_serdos" name="status_serdos" placeholder="Status Serdos" value="{{ old('status_serdos') ?? $profile->status_serdos }}" />
                                    @error('status_serdos')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    @if ($profile->image)
                                        <img src="{{ Storage::url($profile->image) }}" alt="gambar"
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
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="fakultas">Fakultas</label>
                                    <input type="text" class="form-control @error('fakultas') is-invalid @enderror"
                                           id="fakultas" name="fakultas" placeholder="Fakultas" value="{{ old('fakultas') ?? $profile->fakultas }}" />
                                    @error('fakultas')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="prodi">Prodi</label>
                                    <input type="text" class="form-control @error('prodi') is-invalid @enderror"
                                           id="prodi" name="prodi" placeholder="Prodi" value="{{ old('prodi') ?? $profile->prodi }}" />
                                    @error('prodi')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status_dosen">Status Dosen</label>
                                    <input type="text" class="form-control @error('status_dosen') is-invalid @enderror"
                                           id="status_dosen" name="status_dosen" placeholder="Status Dosen" value="{{ old('status_dosen') ?? $profile->status_dosen }}" />
                                    @error('status_dosen')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jabatan_fungsional">Jabatan Fungsional</label>
                                    <input type="text" class="form-control @error('jabatan_fungsional') is-invalid @enderror"
                                           id="jabatan_fungsional" name="jabatan_fungsional" placeholder="Jabatan Fungsional" value="{{ old('jabatan_fungsional') ?? $profile->jabatan_fungsional }}" />
                                    @error('jabatan_fungsional')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                                           id="jabatan" name="jabatan" placeholder="Jabatan" value="{{ old('jabatan') ?? $profile->jabatan }}" />
                                    @error('jabatan')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status_keaktifan">Status Keaktifan</label>
                                    <input type="text" class="form-control @error('status_keaktifan') is-invalid @enderror"
                                           id="status_keaktifan" name="status_keaktifan" placeholder="Status Keaktifan" value="{{ old('status_keaktifan') ?? $profile->status_keaktifan }}" />
                                    @error('status_keaktifan')
                                    <span class="text-danger"> {{ $message }}</span>
                                    @enderror
                                </div>


                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="dokumen">Upload Dokumen (PDF)</label>
                                    <input type="file" name="dokumen" id="dokumen" class="form-control @error('dokumen') is-invalid @enderror">
                                    @error('dokumen')
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
              <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        <!-- /.content-wrapper -->
    </div>
@endsection
