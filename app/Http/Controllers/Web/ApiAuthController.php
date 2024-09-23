<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Services\ApiService;
use Exception;

class ApiAuthController extends Controller
{

    protected $apiService;


    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function showLogin()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            $response = $this->apiService->login($request->input('email'), $request->input('password'));

            // $statusCode = $response['status_code'];
            $response = $response['data'];
            // dd($response);
            if (isset($response['token'])) {
                $user = $response['data'];


                Auth::loginUsingId($user['id']);
                session(['api_token' => $response['token']]);

                if ($user['role'] === 'admin') {
                    $desaWisata = $user['tb_admindesa']['desa_wisata'];
                    session(['desaWisata' => $desaWisata]);
                }

                $this->apiService->setToken($response['token']);

                return redirect()->route('profile.index',)->with([
                    'success' => 'Login successful!',

                ]);
            } else {
                return redirect()->back()->withErrors(['email' => 'Login failed. Invalid credentials.']);
            }
        } catch (Exception $e) {

            return redirect()->back()->withErrors(['email' => 'An error occurred during login: ' . $e->getMessage()]);
        }
    }
}
