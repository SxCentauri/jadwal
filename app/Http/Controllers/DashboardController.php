<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * Akan dipanggil oleh rute /dashboard
     * untuk mengarahkan pengguna berdasarkan role.
     */
    public function __invoke(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $role = Auth::user()->role;

        if ($role == 'admin') {
            return view('admin.dashboard');
        } elseif ($role == 'dosen') {
            return view('dosen.dashboard');
        } elseif ($role == 'user') {
            // Menggunakan view dari folder user
            return view('user.dashboard');
        } else {
            // Fallback jika role tidak terdefinisi
            // Anda bisa logout atau ke view default
            Auth::logout();
            return redirect('/login')->with('error', 'Role Anda tidak valid.');
        }
    }
}
