@extends('layouts.cms')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Permission</h1>
<p class="mb-4">Pilihan Permission User</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="d-inline-block m-0 font-weight-bold text-primary">Tambah Data</h6>
    </div>

    <div class="card-body">
        <form action="{{ route('permission.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label class="mb-1">Nama Permission</label>
                <input class="form-control bg-white" type="text" name="name" placeholder="Masukan nama permission" value="{{ old('name') }}" />

                @error('name')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Save changes button-->
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('permission.index') }}">Batal</a>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
