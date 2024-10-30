<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UserTempahanImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function importUsers(Request $request)
    {
        $request->validate([
            'fail_import' => 'required|file|mimes:xls,xlsx,csv'
        ]);

        try {
            Excel::import(new UserTempahanImport, $request->fail_import);
        }

        catch (\Exception $e) {
            return $e->getMessage();
        }

        return redirect()->back()->with('success', 'Import success');
    }
}
