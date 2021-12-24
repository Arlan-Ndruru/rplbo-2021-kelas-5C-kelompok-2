<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Instance;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardSkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole(['administrator', 'kepalaSekolah'])) {
            $skeluar = File::latest()->where('jenis_surat', 1);
        }elseif (Auth::user()->hasRole('kepalaTU')) {
            $skeluar = File::latest()->where('jenis_surat', 1)
                    ->where('status', 'st-uploud')
                    ->orwhere('jenis_surat', 1)
                    ->where('status', 'kt-uploud')
                    ->orwhere('jenis_surat', 1)
                    ->where('status', 'adm-uploud');
        }else {
            $skeluar = File::latest()->where('jenis_surat', 1)
                ->where('status', 'st-uploud');
        }
        $params = [
            'title' => 'Manage Surat Keluar',
            'files' => $skeluar->filter(request(['search', 'searchDate']))->paginate(5),
        ];
        return view('dash.files.suratkeluar.index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title' => 'Ajukan Surat Keluar',
            'instances' => Instance::latest()->get(),
            'users' => User::latest()->get(),
        ];
        return view('dash.files.suratkeluar.create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'judul_surat' => 'required',
            'asal_surat' => 'required',
            'user_id' => 'required',
            'slug' => 'required|unique:files',
            'no_surat' => 'required|unique:files',
            'perihal' => 'required',
            'tanggal_surat' => 'required',
            'keterangan' => 'required',
            'doc' => 'required|mimes:pdf|max:2048',
        ]);
        // dd($validatedData);
        // Perbedaan jenis uploud berdasarkan role
            if (Auth::user()->hasRole('administrator')) {
                $status = 'adm-uploud';
            } elseif (Auth::user()->hasRole('kepalaSekolah')) {
                $status = 'ksk-uploud';
            } elseif (Auth::user()->hasRole('kepalaTU')) {
                $status = 'kt-uploud';
            } elseif (Auth::user()->hasRole('stafTU')) {
                $status = 'st-uploud';
            } else {
                $rules['status'] = 'required';
                $validatedData = $request->validate($rules);
            }
        //
        $validatedData['status'] = $status;
        $validatedData['jenis_surat'] = 1;
        $validatedData['slug'] = 'sk-'.$request->slug;
        // dd($validatedData);
        if ($request->file('doc')) {
            $validatedData['doc'] = $request->file('doc')->store('surat-keluarFiles');
        }
        File::create($validatedData);
        return redirect('dashboard/suratkeluar')->with('success', "Surat Keluar Created Successfully!");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        $params = [
            'title' => 'Detail Surat Keluar',
            'skeluar' => $file,
        ];

        return view('dash.files.suratkeluar.show')->with($params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        // dd($file);
        $params = [
            'title' => 'Edit Surat Keluar',
            'instances' => Instance::latest()->get(),
            'skeluar' => $file,
        ];
        return view('dash.files.suratkeluar.edit')->with($params);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        // dd($request);
        $rules = [
            'judul_surat' => 'required',
            'asal_surat' => 'required',
            'perihal' => 'required',
            'tanggal_surat' => 'required',
            'keterangan' => 'required',
        ];
        if ($request->no_surat != $file->no_surat) {
            $rules['no_surat'] = 'required|unique:files';
        }
        if ($request->slug != $file->slug) {
            $rules['slug'] = 'required|unique:files';
        }
        $validatedData = $request->validate($rules);
        // dd($validatedData);
        if ($request->file('doc')) {
            if ($request->docOld) {
                Storage::delete($request->docOld);
            }
            $validatedData['doc'] = $request->file('doc')->store('surat-keluarFiles');
        }

        File::where('id', $file->id)
            ->update($validatedData);
        return redirect('dashboard/suratkeluar')->with('success', "Surat Keluar Edited Successfully !");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        if ($file->doc) {
            Storage::delete($file->doc);
        }
        File::destroy($file->id);
        return redirect('dashboard/suratkeluar')->with('success', "Surat Keluar Deleted Successfully !");
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(File::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
