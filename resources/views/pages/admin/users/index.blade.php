@extends('layouts.template_default')
@section('title', 'Halaman Admin')
@section('admin','active')
@section('content')
    <div class="content-wrapper">
        @include('sweetalert::alert')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Halaman Admin</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Halaman Admin</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="btn btn-primary" href="{{route('admin.create')}}"><i class="fa fa-plus"></i> Tambah Admin</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="Table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($admins as $admin)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $admin->name }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>{{ $admin->Level->level}}</td>
                                                <td>
                                                    <div class="text-center">
                                                        @if ($admin->image)

                                                            <img src="{{ Storage::url($admin->image) }}" alt="gambar"
                                                            width="120px" style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%;" class="img-fluid">
                                                    @else
                                                        <img alt="image" class="img-fluid tumbnail"
                                                            src="{{ asset('assets/img/user_default.png') }}" width="120px"
                                                            class="tumbnail img-fluid">
                                                    @endif
                                                    </div>

                                            </td>
                                                <td>

                                                    <div class="text-center d-flex justify-content-between">
                                                        <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                                            <i class="fa fa-pen"></i>
                                                        </a>

                                                        <a href="{{ route('admin.show', $admin->id) }}" class="btn btn-primary btn-sm" title="View">
                                                            <i class="fa fa-eye"></i>
                                                        </a>

                                                        <form action="{{ route('admin.destroy', $admin->id) }}" method="post" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger btn-sm" type="submit" title="Delete">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>

                                                </td>

                                            </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center p-5">Data Kosong</td>
                                         </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
