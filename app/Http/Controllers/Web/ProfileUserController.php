<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Services\ApiService;

class ProfileUserController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index()
    {
        $user = Auth::user();
        return view('profile.dashboard', compact('user'));
    }


    public function logout(Request $request)
    {

        Auth::logout();


        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return Redirect::route('showLogin')->with('success', 'You have been logged out.');
    }
}
