<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/pengguna'; // Default redirect after login  

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function username()
    {
        return 'email'; // Use 'email' for authentication  
    }

    protected function guard()
    {
        return Auth::guard('web'); // Use the default guard for web  
    }

    public function login(Request $request)
    {
        // Validasi input  
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Proses login  
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Arahkan berdasarkan role  
            if ($user->role === 'pemilik_laundry') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'pelanggan') {
                return redirect()->route('pengguna.profil');
            } else {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Role tidak dikenal.');
            }
        }

        // Login gagal  
        return back()->withErrors([
            'email' => 'Email atau kata sandi salah.',
        ]);
    }
}
