<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

/**
 ** Class Controller untuk mengelola request terhadap Users.
 *? Methodnya Terdiri dari : index, create, strore, show, edit, update, destroy.
 *! Object terdiri dari : Users, Role.
 */

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole(['administrator','kepalaSekolah'])) {
            $kepsek = User::whereRoleis(['kepalaSekolah'])->get();
            $TU = User::whereRoleis(['kepalaTU'])->get();
            $stafTU = User::latest()->whereRoleis(['stafTU','receptionist'])->paginate(5);
            $user = User::latest()->whereRoleis(['user'])->paginate(5);
            $params = [
                'title' => 'Manage Users',
                'kepalasekolah' => $kepsek,
                'kepalaTU' => $TU,
                'stafTU' => $stafTU,
                'users' => $user,
                'count_user' => $user->count(),
                'count_stafTU' => $stafTU->count(),
                'count_TU' => $TU->count(),
                'count_kepsek' => $kepsek->count(),
                'roles' => Role::get(),
            ];
        }else{
            $user = User::latest()->whereRoleis(['user'])->paginate(5);
            $params = [
                'title' => 'Manage Users',
                'users' => $user,
                'count_user' => $user->count(),
                'roles' => Role::get(),
            ];
        }
        return view('dash.users.index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->hasRole('administrator')) {
            $roles = Role::all()->reverse();
        }else{
            $roles = Role::all()->reverse()->only([4,5,6]);
        }
        $params = [
            'title' => 'Add User',
            'roles' => $roles
        ];
        return view('dash.users.create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('foto')->store('user-images');
        // dd($request);
        $validatedData = $request->validate([
            'unique_number' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'no_hp' => 'required',
            'foto' => 'image|file|max:2048',
        ]);

        $validatedData['status'] = 1;

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('user-images');
        }

        $role = Role::find($request->input('role_id'));

        // dd($role);
        $user = User::create($validatedData);
        $user->attachRole($role);
        return redirect('dashboard/users')->with('success', "User $user->name has successfully been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $params = [
            'title' => 'Detail Account',
            'user' => $user,
        ];
        return view('dash.users.show')->with($params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $params = [
            'title' => 'Edit User',
            'user' => $user,
            'roles' => Role::all(),
        ];
        return view('dash.users.edit')->with($params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // dd($request);
        $rules =[
            'name' => 'required',
            'no_hp' => 'required',
            'status' => 'required',
            'foto' => 'image|file|max:2048',
        ];
        if ($request->unique_number != $user->unique_number) {
            $rules['unique_number'] = 'required|unique:users';
        }
        if ($request->email != $user->email) {
            $rules['email'] = 'required|unique:users';
        }
        if ($request->password != null) {
            $validatedData['password'] = hash::make($request->password);
        }

        $validatedData = $request->validate($rules);
        // dd($validatedData);
        if ($request->file('foto')) {
            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $validatedData['foto'] = $request->file('foto')->store('user-images');
        }

        User::where('id', $user->id)
                ->update($validatedData);

        return redirect('dashboard/users')->with('success', "User $user->name has successfully been Updated.");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->foto) {
            Storage::delete($user->foto);
        }
        User::destroy($user->id);
        return redirect('dashboard/users')->with('success', "User $user->name has successfully been deleted.");
    }
}
