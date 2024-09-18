@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 800px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    <h1 style="text-align: center; margin-bottom: 20px; color: #333;">Tambah Destinasi Wisata</h1>
    <form action="{{ route('destination.store', $desaWisata->id )}}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column;">
        @csrf
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="tb_desa_wisatas_id" style="font-weight: bold; margin-bottom: 5px; color: #555;">Desa Wisata</label>
            <!-- Add a select or input for Desa Wisata if necessary -->
        </div>
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="nama" style="font-weight: bold; margin-bottom: 5px; color: #555;">Nama</label>
            <input type="text" id="nama" name="nama" class="form-control" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
        </div>
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="deskripsi" style="font-weight: bold; margin-bottom: 5px; color: #555;">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" class="form-control" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; height: 100px;"></textarea>
        </div>
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="gambar" style="font-weight: bold; margin-bottom: 5px; color: #555;">Gambar</label>
            <input type="file" id="gambar" name="gambar" class="form-control" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">
        </div>
        <button type="submit" class="btn btn-success" style="background-color: #28a745; color: #fff; border: none; padding: 10px 20px; border-radius: 4px; font-size: 16px; cursor: pointer; transition: background-color 0.3s;">
            Tambah
        </button>
    </form>
</div>
@endsection
