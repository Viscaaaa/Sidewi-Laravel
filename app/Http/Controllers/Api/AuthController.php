<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|email|unique:tb_akun',
            'role' => 'string',
            'password' => 'required|min:6',
        ]);

        if ($data->fails()) {
            return response()->json($data->errors(), 400);
        }

        $user = akun::create([
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'role' => 'user',
            'password' => Hash::make($request->password)

        ]);

        return response()->json([
            'massage' => 'user registered successfully',
            'user' => $user
        ], 201);
    }

    public function login(Request $request)
    {


        $data = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if ($data->fails()) {
            return response()->json($data->errors(), 400);
        }


        $credentials = $request->only('email', 'password');


        $user = akun::where('email', $credentials['email'])->first();


        if ($user && Hash::check($credentials['password'], $user->password)) {

            $token = $user->createToken('Personal Access Token')->plainTextToken;


            if ($user->role === "super_admin") {

                return response()->json([
                    'message' => 'Login as super admin successfully',
                    'token' => $token,
                    'data' => $user,
                ], 200);
            } else if ($user->role === "admin") {
                $useradmin = $user->tb_admindesa ?? null;
                $desa = $useradmin->DesaWisata;
                return response()->json([
                    'message' => 'Login as admin successfully',
                    'token' => $token,
                    'data' => $user,

                ], 200);
            }

            return response()->json([
                'message' => 'Login as user successfully',
                'token' => $token,
                'data' => $user
            ], 200);
        }

        return response()->json(['message' => 'Email or password is incorrect'], 401);
    }
}
