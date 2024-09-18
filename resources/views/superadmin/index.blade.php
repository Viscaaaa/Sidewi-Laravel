@extends('layouts.app')

@section('content')
    <div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
        <h1 style="font-size: 28px; color: #333; margin-bottom: 20px;">Daftar Admin Desa</h1>
        <a href="{{ route('superadmin.create') }}" style="display: inline-block; padding: 10px 20px; font-size: 16px; color: #fff; background-color: #007bff; text-decoration: none; border-radius: 5px; margin-bottom: 20px; transition: background-color 0.3s;">Tambah Admin</a>

        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #f8f9fa; border-bottom: 2px solid #dee2e6;">
                    <th style="padding: 12px; text-align: left; border-bottom: 1px solid #dee2e6; font-weight: bold;">Nama</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 1px solid #dee2e6; font-weight: bold;">Email</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 1px solid #dee2e6; font-weight: bold;">Desa Wisata</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 1px solid #dee2e6; font-weight: bold;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                    <tr style="border-bottom: 1px solid #dee2e6;">
                        <td style="padding: 12px; vertical-align: middle;">{{ $admin->akun->nama }}</td>
                        <td style="padding: 12px; vertical-align: middle;">{{ $admin->akun->email }}</td>
                        <td style="padding: 12px; vertical-align: middle;">{{ $admin->DesaWisata->nama }}</td>
                        <td style="padding: 12px; vertical-align: middle;">
                            <a href="{{ route('superadmin.edit', $admin->id) }}" style="padding: 6px 12px; font-size: 14px; color: #fff; background-color: #17a2b8; text-decoration: none; border-radius: 4px; margin-right: 8px; transition: background-color 0.3s;">Edit</a>
                            <form action="{{ route('superadmin.destroy', $admin->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="padding: 6px 12px; font-size: 14px; color: #fff; background-color: #dc3545; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s;">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
