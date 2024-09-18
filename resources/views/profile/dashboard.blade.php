<!-- resources/views/profile/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">User Profile</h1>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Profile Information
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $user->nama }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value={{ $user->email }} required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control" value={{ $user->no_telp }}>
                        </div>
                     
                    </form>
                    <div>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" 
                            style="margin:3%; display: inline-block; padding: 8px 12px; font-size: 14px; color: #fff; background-color: #17a2b8; text-decoration: none; border-radius: 5px; margin-right: 5px;">
                           Logout</button>
                        </form>
                    </div>

                    @if(Auth::user()->role === 'super_admin')
                    <div style="margin-top: 1rem;">
                        <a href="{{ route('admin.dashboard') }}" style="background-color: #DC2626; color: white; font-weight: 600; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); transition: background-color 0.3s ease-in-out;" 
                        onmouseover="this.style.backgroundColor='#B91C1C'" 
                        onmouseout="this.style.backgroundColor='#DC2626'">
                            Kelola Admin
                        </a>
                    </div>
                    @elseif(Auth::user()->role === 'admin')
                    <div style="margin-top: 1rem;">
                        <a href="{{ route('destiansi.dashboard') }}" style="background-color: #DC2626; color: white; font-weight: 600; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); transition: background-color 0.3s ease-in-out;" 
                        onmouseover="this.style.backgroundColor='#B91C1C'" 
                        onmouseout="this.style.backgroundColor='#DC2626'">Kelola Admin</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
