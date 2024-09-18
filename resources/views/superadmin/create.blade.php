@extends('layouts.app')

@section('content')
    <h1 style="font-size: 24px; color: #333; margin-bottom: 20px;">Tambah Admin Desa</h1>

    <form action="{{ route('superadmin.store') }}" method="POST" style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="nama" style="display: block; margin-bottom: 5px; font-weight: bold;">Nama:</label>
            <input type="text" name="nama" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold;">Email:</label>
            <input type="email" name="email" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; margin-bottom: 5px; font-weight: bold;">Password:</label>
            <input type="password" name="password" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password_confirmation" style="display: block; margin-bottom: 5px; font-weight: bold;">Konfirmasi Password:</label>
            <input type="password" name="password_confirmation" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="no_telp" style="display: block; margin-bottom: 5px; font-weight: bold;">No. Telp:</label>
            <input type="text" name="no_telp" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="tb_desa_wisatas_id" style="display: block; margin-bottom: 5px; font-weight: bold;">Desa Wisata:</label>
            <select name="tb_desa_wisatas_id" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                @foreach($desa_wisata as $desa)
                    <option value="{{ $desa->id }}">{{ $desa->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" style="padding: 10px 20px; font-size: 16px; color: #fff; background-color: #007bff; border: none; border-radius: 4px; cursor: pointer;">Simpan</button>
    </form>
@endsection
