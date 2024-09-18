<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body style="font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; background-color: #f4f4f4;">
    <div style="background-color: #fff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); padding: 20px; width: 100%; max-width: 400px;">
        <h2 style="margin-bottom: 20px; text-align: center; color: #333;">Login</h2>

        @if ($errors->any())
            <div style="margin-bottom: 20px; color: #e74c3c;">
                <ul style="list-style: none; padding: 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/login" method="POST" style="display: flex; flex-direction: column;">
            @csrf
            <!-- Email Address -->
            <div style="margin-bottom: 15px;">
                <label for="email" style="display: block; margin-bottom: 5px; color: #555;">Email</label>
                <input id="email" name="email" type="email" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;" value="{{ old('email') }}">
            </div>

            <!-- Password -->
            <div style="margin-bottom: 20px;">
                <label for="password" style="display: block; margin-bottom: 5px; color: #555;">Password</label>
                <input id="password" name="password" type="password" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            </div>

            <!-- Login Button -->
            <button type="submit" style="background-color: #007bff; color: #fff; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">
                Login
            </button>
        </form>
        <p style="margin-top: 20px; text-align: center; color: #555;">
            <a href="/formregister" style="color: #007bff; text-decoration: none;">Don't have an account? Register</a>
        </p>
    </div>
</body>
</html>
