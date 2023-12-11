@extends('layouts.cms')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Keuangan</h1>
<p class="mb-4">Riwayat Catatan Keuangan</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="d-inline-block m-0 font-weight-bold text-primary">Tambah Data</h6>
    </div>

    <div class="card-body">
        <form action="{{ route('keuangan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label class="mb-1">Jumlah</label>
                <input class="form-control bg-white" type="number" name="jumlah" placeholder="Masukan jumlah" value="{{ old('jumlah') }}" />

                @error('jumlah')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="mb-1">Jenis</label>
                <select class="form-control" name="jenis">
                    <option disabled selected>-- Pilih Jenis --</option>

                    <option value="0">Uang Masuk</option>
                    <option value="1">Uang Keluar</option>
                </select>

                @error('jenis')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="mb-1">Kategori</label>
                <select class="form-control" name="id_kategori">
                    <option disabled selected>-- Pilih Kategori --</option>

                    @foreach($kategori as $value)
                        <option value="{{ $value->id }}">
                            {{ $value->nama }}
                        </option>
                    @endforeach
                </select>

                @error('id_kategori')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="mb-1">Deskripsi</label>
                <input class="form-control bg-white" type="text" name="deskripsi" placeholder="Masukan deskripsi" value="{{ old('deskripsi') }}" />

                @error('deskripsi')
                    <div class="mt-2 text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Save changes button-->
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('keuangan.index') }}">Batal</a>
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
