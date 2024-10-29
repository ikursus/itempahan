<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Dapatkan senarai kategori bersama dengan sub kategori
        $senaraiKategori = Kategori::whereNull('parent_id')->with('childRecursive')->get();

        return view('welcome', compact('senaraiKategori'));
    }
}
