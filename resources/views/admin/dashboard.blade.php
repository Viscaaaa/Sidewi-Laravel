@extends('layouts.app')

@section('content')
    <h1 style="text-align: center; margin-bottom: 20px;">Admin Dashboard</h1>
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="{{ route('admin.create') }}" style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">Create New Admin</a>
    </div>

    <table style="width: 100%; border-collapse: collapse; margin: 20px auto; font-family: Arial, sans-serif;">
        <thead style="background-color: #f2f2f2; text-align: left;">
            <tr>
                <th style="padding: 12px; border: 1px solid #ddd;">ID</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Desa Wisata</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Akun</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $admin['id'] }}</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $admin['desa_wisata']['nama'] }}</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $admin['akun']['nama'] }}</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">
                        <a href="{{ route('admin.edit', $admin['id']) }}" style="color: #007bff; text-decoration: none; margin-right: 10px;">Edit</a>
                        <form action="{{ route('admin.destroy', $admin['id']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background-color: #dc3545; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer;">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
