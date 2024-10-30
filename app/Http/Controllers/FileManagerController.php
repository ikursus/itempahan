<?php

namespace App\Http\Controllers;

use App\Models\FileManager;
use Illuminate\Http\Request;

class FileManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Dapatkan senarai fail upload dan buatkan fungsi pagination
        $senaraiFiles = FileManager::paginate(5);

        return view('file-manager.template-index', compact('senaraiFiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('file-manager.template-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fail_upload.*' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip,rar,png,jpg,jpeg,png,gif|max:2048',
        ]);

        // Simpan di public folder. Data daripada form adalah multiple
        // Dapatkan nama file dan simpan rekod di dalam table file_managers pada column nama_fail
        if ( $request->hasFile('fail_upload') )
        {
            foreach ($request->file('fail_upload') as $file)
            {
                $file_name = $file->getClientOriginalName();
                // $file_ext = $file->getClientOriginalExtension();
                $file->move(public_path('files'), $file_name);

                // Simpan ke dalam table file_managers
                FileManager::create([
                    'nama_fail_asal' => $file_name,
                    //'extensi_fail' => $file->getClientOriginalExtension(),
                    'lokasi_fail' => 'files/' . $file_name
                ]);
            }
        }

        // Beri response dengan return ke senarai filee_managers
        return redirect()->route('file-manager.index')->with('success', 'File berjaya disimpan');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $fileManager = FileManager::findByHashid($id);
        // Muat Turun Fail upload
        return response()->download( public_path($fileManager->lokasi_fail) );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
