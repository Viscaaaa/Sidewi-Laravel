<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Destinasi</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .card {
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }
        .card-header {
            background-color: #f7fafc;
            border-bottom: 1px solid #e2e8f0;
            padding: 1rem;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card-body {
            padding: 1rem;
        }
        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            font-weight: 600;
            color: #ffffff;
            background-color: #3182ce;
            border-radius: 0.375rem;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s ease-in-out;
        }
        .btn:hover {
            background-color: #2b6cb0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid #e2e8f0;
            padding: 0.75rem;
            text-align: left;
        }
        table th {
            background-color: #f7fafc;
            font-weight: bold;
        }
        table td {
            background-color: #ffffff;
        }
        .action-buttons a, .action-buttons button {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: #ffffff;
            border-radius: 0.375rem;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s ease-in-out;
            margin-right: 0.5rem;
        }
        .action-buttons a {
            background-color: #4a5568;
        }
        .action-buttons a:hover {
            background-color: #2d3748;
        }
        .action-buttons button {
            background-color: #e53e3e;
            border: none;
            cursor: pointer;
        }
        .action-buttons button:hover {
            background-color: #c53030;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Dashboard Desa Wisata</h1>

        <!-- Display Desa Wisata Information -->
        <div class="card mb-6">
            <div class="card-header">
                Desa Wisata
                <a href="{{ route('destinasi.create', ['desa_id' => $desaWisata['id']]) }}" class="btn">Tambah Destinasi</a>

            </div>
            <div class="card-body">
                <p><strong>Nama:</strong> {{ $desaWisata['nama'] }}</p>
                <p><strong>Alamat:</strong> {{ $desaWisata['alamat'] }}</p>
                <p><strong>Deskripsi:</strong> {{ $desaWisata['deskripsi'] }}</p>
                <p><strong>Kategori:</strong> {{ $desaWisata['kategori'] }}</p>
                <p><strong>Kabupaten:</strong> {{ $desaWisata['kabupaten'] }}</p>
                <a href="{{ $desaWisata['maps'] }}" class="text-blue-500 hover:underline" target="_blank">Lihat di Maps</a>
            </div>
        </div>

        <!-- Display Destinasi List -->
        <div class="card">
            <div class="card-header">
                Destinasi
            </div>
            <div class="card-body">
                @if (!empty($destinasi))
                    <table>
                        <thead>
                            <tr>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($destinasi as $destinasiItem)
                                <tr>
                                    <td>
                                        <img src="{{ asset($destinasiItem['gambar']) }}" alt="{{ $destinasiItem['nama'] }}" class="w-24 h-16 object-cover">
                                    </td>
                                    <td>{{ $destinasiItem['nama'] }}</td>
                                    <td>{{ $destinasiItem['deskripsi'] }}</td>
                                    <td class="action-buttons">
                                        <a href="{{ route('destinasi.edit', $destinasiItem['id']) }}">Edit</a>
                                        <form action="{{ route('destinasi.destroy', $destinasiItem['id']) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Tidak ada destinasi yang ditemukan.</p>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
