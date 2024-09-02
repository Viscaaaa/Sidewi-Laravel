<!-- resources/views/pages/destinasi/edit.blade.php -->

@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Edit Destinasi Wisata di {{ $desaWisata->nama }}</h1>

    <form action="{{ route('destination.update', [$desaWisata->id, $destinasiWisata->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control" value="{{ $destinasiWisata->nama }}" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" class="form-control" required>{{ $destinasiWisata->deskripsi }}</textarea>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" id="gambar" name="gambar" class="form-control">
            <img src="{{ asset('storage/' . $destinasiWisata->gambar) }}" alt="{{ $destinasiWisata->nama }}" width="100">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
