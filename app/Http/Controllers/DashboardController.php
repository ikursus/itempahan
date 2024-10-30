<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Tempahan;
use App\Models\TempahanItem;
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

        $totalKategori = Cache::remember('cache-total-kategori', 3600, function () {
            return Kategori::count();
        });

        $totalTempahan = Cache::remember('cache-total-tempahan', 3600, function () {
            return Tempahan::count();
        });

        $totalItem = Cache::remember('cache-total-item', 3600, function () {
            return TempahanItem::count();
        });

        return view('template-dashboard', compact('totalUsers', 'totalKategori', 'totalTempahan', 'totalItem'));
    }
}
