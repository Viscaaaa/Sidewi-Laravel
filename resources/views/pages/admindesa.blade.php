@extends('layouts.app')

@section('content')
<div style="max-width: 1200px; margin: 50px auto; padding: 20px; background-color: #f9f9f9; border-radius: 10px;">
    <h1>Daftar Destinasi Wisata di {{ $desaWisata->nama }}</h1>
    <a href="/desa-wisata/{{ $desaWisata->id }}/destination/create" style="display: inline-block; padding: 10px 20px; margin-bottom: 20px; background-color: #007bff; color: #fff; border-radius: 5px; text-decoration: none;">
        <i class="fas fa-plus"></i> Tambah Destinasi Wisata
    </a>
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <thead>
            <tr style="background-color: #007bff; color: #fff;">
                <th style="padding: 10px; border: 1px solid #ccc;">ID</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Nama</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Deskripsi</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Gambar</th>
                <th style="padding: 10px; border: 1px solid #ccc;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($destinasiWisata as $destinasi)
                <tr>
                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $destinasi->id }}</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $destinasi->nama }}</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">{{ Str::limit($destinasi->deskripsi, 50) }}</td>
                    <td style="padding: 10px; border: 1px solid #ccc;">
                        <img src="{{ asset($destinasi->gambar) }}" width="100" alt="{{ $destinasi->nama }}" style="border-radius: 5px;">
                    </td>
                    <td style="padding: 10px; border: 1px solid #ccc;">
                        <a href="" style="display: inline-block; padding: 5px 10px; margin-bottom: 5px; background-color: #17a2b8; color: #fff; border-radius: 5px; text-decoration: none;">
                            <i class="fas fa-eye"></i> Detail
                        </a>
                        <a href="{{ route('destination.edit', [$desaWisata->id, $destinasi->id]) }}" style="display: inline-block; padding: 5px 10px; margin-bottom: 5px; background-color: #ffc107; color: #fff; border-radius: 5px; text-decoration: none;">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action={{ route('destination.destroy', [$desaWisata->id, $destinasi->id]) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="padding: 5px 10px; background-color: #dc3545; color: #fff; border: none; border-radius: 5px; cursor: pointer;">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection