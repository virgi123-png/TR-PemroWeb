<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        // Middleware untuk verifikasi admin
        $this->middleware(function ($request, $next) {
            if ($request->user() && $request->user()->role === 'admin') {
                return $next($request);
            }
            return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        });
    }

    public function index()
    {
        // Hitung jumlah user dengan role 'user' untuk ditampilkan sebagai visitors
        $visitorCount = User::where('role', 'user')->count();
        return view('dashboard.index', compact('visitorCount'));
    }

    public function datatables()
    {
        // Ambil semua user dengan role 'user'
        $users = User::where('role', 'user')->get();

        return view('dashboard.datatables', compact('users'));
    }


    public function forms()
    {
        $tipeJams = \App\Models\TipeJam::with('user')->get();
        return view('dashboard.forms', compact('tipeJams'));
    }
}
