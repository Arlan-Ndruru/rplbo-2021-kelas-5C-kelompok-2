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

class DashboardSmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ddd($files);
        if (Auth::user()->hasRole('administrator')) {
            $title = "Administrator";
            $files = File::latest()->where('jenis_surat', 0);
        } elseif (Auth::user()->hasRole('kepalaSekolah')) {
            $title = "Kepala Sekolah";
            $files = File::latest()->where('jenis_surat', 0)
                ->where('status', 'ksk-uploud')
                ->orwhere('jenis_surat', 0)
                ->where('status', 'kt-uploud');
        } elseif (Auth::user()->hasRole('kepalaTU')) {
            $title = "Kepala Tata Usaha";
            $files = File::latest()->where('jenis_surat', 0)
                ->where('status', 'st-uploud')
                ->orwhere('jenis_surat', 0)
                ->where('status', 'kt-uploud');
        } else{
            $title = "Staf Tata Usaha";
            $files = File::latest()->where('jenis_surat', 0)
                ->where('status', 'usr-uploud')
                ->orwhere('jenis_surat', 0)
                ->where('status', 'st-uploud');
        }

        $params = [
            'title' => 'Manage Surat Masuk | '.$title,
            'files' => $files->filter(request(['search', 'searchDate']))->paginate(5),
        ];
        return view('dash.files.suratmasuk.index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title' => 'Uploud Surat Masuk',
            'instances' => Instance::latest()->get(),
            'users' => User::latest()->get(),
        ];
        return view('dash.files.suratmasuk.create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'judul_surat' => 'required',
            'slug' => 'required|unique:files',
            'user_id' => 'required',
            'asal_surat' => 'required',
            'no_surat' => 'required|unique:files',
            'perihal' => 'required',
            'tanggal_surat' => 'required|date',
            'keterangan' => 'required',
            'doc' => 'required|mimes:pdf|max:2048',
        ]);
        // dd($validatedData);
        // Perbedaan jenis uploud berdasarkan role
            if (Auth::user()->hasRole('administrator')) {
                $status = 'adm-uploud';
            }elseif (Auth::user()->hasRole('kepalaSekolah')) {
                $status = 'ksk-uploud';
            }elseif (Auth::user()->hasRole('kepalaTU')) {
                $status = 'kt-uploud';
            }elseif (Auth::user()->hasRole('stafTU')) {
                $status = 'st-uploud';
            }elseif (Auth::user()->hasRole('receptionist')) {
                $status = 'rc-uploud';
            }elseif (Auth::user()->hasRole('user')) {
                $status = 'usr-uploud';
            }else{
                $rules['status'] = 'required';
                $validatedData = $request->validate($rules);
            }
        //
        $validatedData['status'] = $status;
        $validatedData['slug'] = 'sm-'.$request->slug;
        $validatedData['jenis_surat'] = 0;
        // $validatedData['tanggalditerima'] = Carbon::now()->format('Y-m-d H:i:m');
        // dd($validatedData);
        if ($request->file('doc')) {
            $validatedData['doc'] = $request->file('doc')->store('surat-masukFiles');
        }
        File::create($validatedData);

        return redirect('dashboard/suratmasuk')->with('success', "Berhasil Uploud Surat");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        // dd($file);
        $params = [
            'title' => 'Detail Surat Masuk',
            'smasuk' => $file,
        ];
        return view('dash.files.suratmasuk.show')->with($params);
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
            'title' => 'Edit Surat Masuk',
            'instances' => Instance::latest()->get(),
            'smasuk' => $file,
        ];
        return view('dash.files.suratmasuk.edit')->with($params);
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
        $rules = [
            'judul_surat' => 'required',
            'asal_surat' => 'required',
            'perihal' => 'required',
            'tanggal_surat' => 'required|date',
            'keterangan' => 'required',
            'status' => 'required',
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
            $validatedData['doc'] = $request->file('doc')->store('surat-masukFiles');
        }

        // dd($validatedData);

        File::where('id', $file->id)
                ->update($validatedData);
        return redirect('dashboard/suratmasuk')->with('success', "Surat Masuk Edited Successfully !");
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
        return redirect('dashboard/suratmasuk')->with('success', "Surat Masuk Deleted Successfully !");
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(File::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
