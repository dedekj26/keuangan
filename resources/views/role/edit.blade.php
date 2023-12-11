@extends('layouts.cms')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Role</h1>
<p class="mb-4">Pilihan Role User</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="d-inline-block m-0 font-weight-bold text-primary">Edit Data</h6>
    </div>

    <div class="card-body">
        <form action="{{ route('role.update', $role) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="form-group">
                <label class="mb-1">Nama Role</label>
                <input class="form-control bg-white" type="text" name="name" placeholder="Masukan nama role" value="{{ $role->name }}" />

                @error('name')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="mb-1">Permissions</label>
                @foreach($permission as $value)
                    <div class="form-check">
                        @if ($role->hasPermissionTo($value->name))
                            <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $value->name }}" checked>
                        @else
                            <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $value->name }}">
                        @endif

                        <label class="form-check-label">{{ $value->name }}</label>
                    </div>
                @endforeach

                @error('permission')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Save changes button-->
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('role.index') }}">Batal</a>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
