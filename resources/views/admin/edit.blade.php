@extends('layouts.app')

@section('content')
    <h1 style="text-align: center; margin-bottom: 20px;">Edit Admin</h1>

    <form action="{{ route('admin.update', $admin['id']) }}" method="POST" style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">
        @if (session('success'))
    <div style="background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; border-radius: 5px; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
    @endif
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label for="tb_desa_wisatas_id" style="display: block; margin-bottom: 5px; font-weight: bold;">Desa Wisata ID:</label>
            <input type="text" id="tb_desa_wisatas_id" name="tb_desa_wisatas_id" value="{{ old('tb_desa_wisatas_id', $admin['tb_desa_wisatas_id']) }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold;">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $admin['akun']['email']) }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; margin-bottom: 5px; font-weight: bold;">Password:</label>
            <input type="password" id="password" name="password" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password_confirmation" style="display: block; margin-bottom: 5px; font-weight: bold;">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="nama" style="display: block; margin-bottom: 5px; font-weight: bold;">Name:</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $admin['akun']['nama']) }}" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="no_telp" style="display: block; margin-bottom: 5px; font-weight: bold;">Phone Number:</label>
            <input type="text" id="no_telp" name="no_telp" value="{{ old('no_telp', $admin['akun']['no_telp']) }}" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="text-align: center;">
            <button type="submit" style="background-color: #4CAF50; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Update Admin</button>
        </div>
    </form>
@endsection
