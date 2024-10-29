<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Kira jumlah keseluruhan users
        // $totalUsers = User::count();
        $totalUsers = Cache::remember('cache-total-users', 3600, function () {
            return User::count();
        });

        return view('template-dashboard', compact('totalUsers'));
    }
}
