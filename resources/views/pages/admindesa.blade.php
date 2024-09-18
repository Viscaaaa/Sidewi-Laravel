@extends('layouts.app')

@section('content')
<div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
    <h1 style="font-size: 28px; color: #333; margin-bottom: 20px;">Destinasi Wisata di {{ $desaWisata->nama }}</h1>

    <a href="{{ route('destination.create', $desaWisata->id )}}" 
       style="display: inline-block; padding: 10px 20px; font-size: 16px; color: #fff; background-color: #007bff; text-decoration: none; border-radius: 5px; margin-bottom: 20px;">
       Tambah Destinasi
    </a>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr style="background-color: #f8f9fa; border-bottom: 2px solid #dee2e6;">
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #dee2e6;">ID</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #dee2e6;">Nama</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #dee2e6;">Deskripsi</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #dee2e6;">Gambar</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #dee2e6;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($destinasiWisata as $destinasi)
                <tr style="border-bottom: 1px solid #dee2e6;">
                    <td style="padding: 10px;">{{ $destinasi->id }}</td>
                    <td style="padding: 10px;">{{ $destinasi->nama }}</td>
                    <td style="padding: 10px;">{{ Str::limit($destinasi->deskripsi, 50) }}</td>
                    <td style="padding: 10px;">
                        <img src="{{ asset($destinasi->gambar) }}" alt="Gambar Destinasi" style="max-width: 100px; border-radius: 5px;">
                    </td>
                    <td style="padding: 10px;">
                        <a href="{{ route('destination.edit', ['desaWisata' => $desaWisata->id, 'destination' => $destinasi->id]) }}" 
                           style="display: inline-block; padding: 8px 12px; font-size: 14px; color: #fff; background-color: #17a2b8; text-decoration: none; border-radius: 5px; margin-right: 5px;">
                           Edit
                        </a>
                        <form action="{{ route('destination.destroy', $destinasi->id )}}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="padding: 8px 12px; font-size: 14px; color: #fff; background-color: #dc3545; border: none; border-radius: 5px; cursor: pointer;">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
