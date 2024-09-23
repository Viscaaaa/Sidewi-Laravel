@extends('layouts.app')

@section('content')
<div style="
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
">
    <h1 style="
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 20px;
        color: #2d3748;
    ">Tambah Destinasi Wisata</h1>

    <!-- Menampilkan pesan error API jika ada -->
    @if ($errors->has('api_error'))
        <div style="
            margin-bottom: 16px;
            padding: 10px;
            background-color: #f56565;
            color: #ffffff;
            border-radius: 4px;
        ">
            {{ $errors->first('api_error') }}
        </div>
    @endif

    <!-- Menampilkan respons API jika ada -->
    @if (session()->has('api_response'))
        <div style="
            margin-bottom: 16px;
            padding: 10px;
            background-color: #e2e8f0;
            color: #2d3748;
            border-radius: 4px;
        ">
            <strong>API Response:</strong>
            <pre>{{ print_r(session('api_response'), true) }}</pre>
        </div>
    @endif

    <!-- Menampilkan data yang diinput dan tipe datanya -->
    @if (session()->has('input_data'))
        <div style="
            margin-bottom: 16px;
            padding: 10px;
            background-color: #e2e8f0;
            color: #2d3748;
            border-radius: 4px;
        ">
            <strong>Input Data:</strong>
            <pre>
                @foreach (session('input_data') as $key => $value)
                    {{ $key }}: {{ gettype($value) }} - {{ $value }}
                @endforeach
            </pre>
        </div>
    @endif

    <form action="{{ route('destinasi.store') }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 16px;">
        @csrf

        <!-- Hidden input for desa_id -->
        <input type="hidden" name="tb_desa_wisatas_id" value="{{ $desa_id }}">

        <div style="margin-bottom: 16px;">
            <label for="deskripsi" style="
                display: block;
                font-size: 0.875rem;
                font-weight: 500;
                color: #4a5568;
                margin-bottom: 4px;
            ">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="4" style="
                width: 100%;
                padding: 8px;
                border: 1px solid #d1d5db;
                border-radius: 4px;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
                font-size: 0.875rem;
                outline: none;
                transition: border-color 0.2s;
            " onfocus="this.style.borderColor='#4f46e5'" onblur="this.style.borderColor='#d1d5db'">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <p style="
                    color: #f56565;
                    font-size: 0.875rem;
                    margin-top: 4px;
                ">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom: 16px;">
            <label for="nama" style="
                display: block;
                font-size: 0.875rem;
                font-weight: 500;
                color: #4a5568;
                margin-bottom: 4px;
            ">Nama</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" style="
                width: 100%;
                padding: 8px;
                border: 1px solid #d1d5db;
                border-radius: 4px;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
                font-size: 0.875rem;
                outline: none;
                transition: border-color 0.2s;
            " onfocus="this.style.borderColor='#4f46e5'" onblur="this.style.borderColor='#d1d5db'">
            @error('nama')
                <p style="
                    color: #f56565;
                    font-size: 0.875rem;
                    margin-top: 4px;
                ">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom: 16px;">
            <label for="gambar" style="
                display: block;
                font-size: 0.875rem;
                font-weight: 500;
                color: #4a5568;
                margin-bottom: 4px;
            ">Gambar</label>
            <input type="file" id="gambar" name="gambar" style="
                width: 100%;
                padding: 8px;
                border: 1px solid #d1d5db;
                border-radius: 4px;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
                font-size: 0.875rem;
                outline: none;
            ">
            @error('gambar')
                <p style="
                    color: #f56565;
                    font-size: 0.875rem;
                    margin-top: 4px;
                ">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" style="
            width: 100%;
            padding: 10px;
            background-color: #3182ce;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: background-color 0.2s, box-shadow 0.2s;
        " onmouseover="this.style.backgroundColor='#2b6cb0'" onmouseout="this.style.backgroundColor='#3182ce'" onfocus="this.style.boxShadow='0 0 0 2px rgba(66, 153, 225, 0.5)'" onblur="this.style.boxShadow='none'">
            Simpan
        </button>
    </form>
</div>
@endsection
