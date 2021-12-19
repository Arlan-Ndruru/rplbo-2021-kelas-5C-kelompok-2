<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        }elseif (Auth::user()->hasRole('kepalaSekolah')) {
            $title = "Kepala Sekolah";
        }elseif (Auth::user()->hasRole('kepalaTU')) {
            $title = "Tata Usaha";
        }elseif (Auth::user()->hasRole('stafTU')) {
            $title = "Staf Tata Usaha";   
        }elseif (Auth::user()->hasRole('receptionist')) {
            $title = "Receptionist";
        }else {
            $title = "User";
        }
        $params = [
            'title' => $title,
            'c3' => $pegawai,
            'c4' => $pengguna,
        ];

        return view('dash.index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
}
