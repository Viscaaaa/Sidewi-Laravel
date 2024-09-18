@extends('layouts.app')

@section('content')
    <h1 style="text-align: center; color: #333; margin-bottom: 20px;">Create New Admin</h1>

    <form action="{{ route('admin.store') }}" method="POST" style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="tb_desa_wisatas_id" style="display: block; font-weight: bold; margin-bottom: 5px;">Desa Wisata ID:</label>
            <input type="text" id="tb_desa_wisatas_id" name="tb_desa_wisatas_id" value="{{ old('tb_desa_wisatas_id') }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            @error('tb_desa_wisatas_id')
                <div style="color: #e74c3c; font-size: 0.875rem; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            @error('email')
                <div style="color: #e74c3c; font-size: 0.875rem; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; font-weight: bold; margin-bottom: 5px;">Password:</label>
            <input type="password" id="password" name="password" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            @error('password')
                <div style="color: #e74c3c; font-size: 0.875rem; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password_confirmation" style="display: block; font-weight: bold; margin-bottom: 5px;">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            @error('password_confirmation')
                <div style="color: #e74c3c; font-size: 0.875rem; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="nama" style="display: block; font-weight: bold; margin-bottom: 5px;">Name:</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            @error('nama')
                <div style="color: #e74c3c; font-size: 0.875rem; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="no_telp" style="display: block; font-weight: bold; margin-bottom: 5px;">Phone Number:</label>
            <input type="text" id="no_telp" name="no_telp" value="{{ old('no_telp') }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            @error('no_telp')
                <div style="color: #e74c3c; font-size: 0.875rem; margin-top: 5px;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" style="background-color: #007bff; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-size: 1rem; transition: background-color 0.3s;">
            Create Admin
        </button>
    </form>
@endsection
