<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Instance;
use Illuminate\Support\Str;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = User::latest()->whereRoleis(['stafTU'])->count();
        $pengguna = User::latest()->whereRoleis(['user'])->count();
        if (Auth::user()->hasRole('administrator')) {
            $title = "Administrator";
            $smasuk = File::latest()->where('jenis_surat', 0);
            $skeluar = File::latest()->where('jenis_surat', 1);
        }elseif (Auth::user()->hasRole('kepalaSekolah')) {
            $title = "Kepala Sekolah";
            $smasuk = File::latest()->where('jenis_surat', 0);
            $skeluar = File::latest()->where('jenis_surat', 1);

        }elseif (Auth::user()->hasRole('kepalaTU')) {
            $title = "Tata Usaha";
            $smasuk = File::latest()->where('jenis_surat', 0)
                ->where('status', 'st-uploud')
                ->orwhere('jenis_surat', 0)
                ->where('status', 'kt-uploud');
            $skeluar = File::latest()->where('jenis_surat', 1)
                ->where('status', 'st-uploud')
                ->orwhere('jenis_surat', 1)
                ->where('status', 'kt-uploud');

        }elseif (Auth::user()->hasRole('stafTU')) {
            $title = "Staf Tata Usaha";
            $smasuk = File::latest()->where('jenis_surat', 0)
                ->where('status', 'usr-uploud')
                ->orwhere('jenis_surat', 0)
                ->where('status', 'st-uploud');
            $skeluar = File::latest()->where('jenis_surat', 1)
                ->where('status', 'usr-uploud')
                ->orwhere('jenis_surat', 1)
                ->where('status', 'st-uploud');
            
        }elseif (Auth::user()->hasRole('receptionist')) {
            $title = "Receptionist";
        }else {
            $title = "User";
            $id_pengguna = Auth::user()->id;
            $files = File::latest()->where('jenis_surat', 0)
                    ->Where('user_id', $id_pengguna)
                    ->orwhere('jenis_surat', 1)
                    ->Where('user_id', $id_pengguna);
        }
        
        if (Auth::user()->hasRole('user')) {
            $params = [
                'title' => $title,
                'files' => $files->get(),
                'Cfiles' => $files->count(),
            ];    
        }elseif (Auth::user()->hasRole('kepalaTU')) {
            $params = [
                'title' => $title,
                'smasuk' => $smasuk->count(),
                'skeluar' => $skeluar,
                'c3' => $pegawai,
                'c4' => $pengguna,
            ];
        }elseif (Auth::user()->hasRole('kepalaSekolah')) {
            $params = [
                'title' => $title,
                'smasuk' => $smasuk->count(),
                'skeluar' => $skeluar,
                'c3' => $pegawai,
                'c4' => $pengguna,
            ];
        } elseif (Auth::user()->hasRole('administrator')) {
            $params = [
                'title' => $title,
                'smasuk' => $smasuk->count(),
                'skeluar' => $skeluar,
                'c3' => $pegawai,
                'c4' => $pengguna,
            ];
        }
        else {
            $params = [
                'title' => $title,
                'c3' => $pegawai,
                'c4' => $pengguna,
                'smasuk' => $smasuk->count(),
                'skeluar' => $skeluar,
            ];
        }

        return view('dash.index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title' => 'User | Uploud',
            'instances' => Instance::latest()->get(),
        ];
        return view('dash.files.create')->with($params);
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
            'slug' => 'required|unique:files',
            'perihal' => 'required',
            'tanggal_surat' => 'required',
            'keterangan' => 'required',
        ]);
        $validatedData['user_id'] = Auth::user()->id;
        $file = File::latest()->where('user_id', $validatedData['user_id'])->first();
        $validatedData['no_surat'] = 'sm/'.(Str::random(12)).'/'.$request->slug.'/'.sprintf("%03s", abs($file->id + 1));
        $validatedData['status'] = "usr-uploud";
        $validatedData['jenis_surat'] = 0;
        
        
        // dd($validatedData);
        if ($request->file('doc')) {
            $validatedData['doc'] = $request->file('doc')->store('surat-masukFiles');
        }

        File::create($validatedData);
        return redirect('/dashboard')->with('success', "Berhasil Uploud !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Instance::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
