<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">

    <div style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); width: 100%; max-width: 400px;">
        @if ($errors->any())
            <div style="margin-bottom: 20px; color: #e74c3c;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div style="margin-bottom: 20px; color: #2ecc71;">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="/register">
            <!-- Token CSRF -->
            @csrf

            <div style="margin-bottom: 15px;">
                <label for="nama" style="display: block; margin-bottom: 5px; font-weight: bold;">Nama</label>
                <input id="nama" type="text" name="nama" value="{{ old('nama') }}" required autofocus style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="no_telp" style="display: block; margin-bottom: 5px; font-weight: bold;">No_telp</label>
                <input id="no_telp" type="text" name="no_telp" value="{{ old('no_telp') }}" required autofocus style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold;">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="password" style="display: block; margin-bottom: 5px; font-weight: bold;">Kata Sandi</label>
                <input id="password" type="password" name="password" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
            </div>

            <div style="margin-bottom: 15px;">
                <label for="password_confirmation" style="display: block; margin-bottom: 5px; font-weight: bold;">Konfirmasi Kata Sandi</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;">
            </div>

            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                <a href="/login" style="color: #007bff; text-decoration: none;">Sudah terdaftar?</a>
                <button type="submit" style="background-color: #007bff; color: #fff; border: none; padding: 10px 15px; border-radius: 4px; cursor: pointer;">Registrasi</button>
            </div>
        </form>
    </div>

</body>
</html>
