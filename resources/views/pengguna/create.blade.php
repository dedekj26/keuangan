@extends('layouts.cms')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Pengguna</h1>
<p class="mb-4">Kelola Data Pengguna</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="d-inline-block m-0 font-weight-bold text-primary">Tambah Data</h6>
    </div>

    <div class="card-body">
        <form action="{{ route('pengguna.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label class="mb-1">Nama Lengkap</label>
                <input class="form-control bg-white" type="text" name="name" placeholder="Masukan nama" value="{{ old('name') }}" />

                @error('name')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="mb-1">Email</label>
                <input class="form-control bg-white" type="email" name="email" placeholder="Masukan email" value="{{ old('email') }}" />

                @error('email')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="mb-1">Password</label>
                <input class="form-control bg-white" type="password" name="password" placeholder="Masukan password" value="{{ old('password') }}" />

                @error('password')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="mb-1">Role</label>
                <select class="form-control" name="role">
                    <option disabled selected>-- Pilih Role --</option>

                    @foreach($role as $value)
                        <option value="{{ $value->name }}">
                            {{ $value->name }}
                        </option>
                    @endforeach
                </select>

                @error('role')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Save changes button-->
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('pengguna.index') }}">Batal</a>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
