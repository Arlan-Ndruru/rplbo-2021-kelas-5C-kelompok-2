<?php

namespace App\Http\Controllers\dashboard;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Controllers\Controller;
use App\Models\Instance;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardInstanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instances = Instance::latest()->paginate(5);
        $params = [
            'title' => 'Instansi',
            'instances' => $instances,
        ];
        return view('dash.instances.index')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            'title' => 'Instance | Add',
        ];

        return view('dash.instances.create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'name' => 'required|min:3',
            'slug' => 'required|unique:instances',
            'alamat' => 'required|min:3',
            'no_hp' => 'required|numeric',
        ]);
        // dd($validatedData);
        $validatedData['user_id'] = Auth::user()->id;
        Instance::create($validatedData);
        
        return redirect('dashboard/instances')->with('success', "Instance $request->name has successfully been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instance  $instance
     * @return \Illuminate\Http\Response
     */
    public function show(Instance $instance)
    {
        $params = [
            'title' => 'Instance | Detail',
            'instance' => $instance,
        ];

        return view('dash.instances.show')->with($params);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instance  $instance
     * @return \Illuminate\Http\Response
     */
    public function edit(Instance $instance)
    {
        // dd($instance);
        $params = [
            'title' => 'Instansi | Edit',
            'instance' => $instance,
        ];
        return view('dash.instances.edit')->with($params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instance  $instance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instance $instance)
    {
        $rules = [
            'name' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ];

        if ($request->slug != $instance->slug) {
            $rules['slug'] = 'required|unique:instances';
        }

        $validatedData = $request->validate($rules);

        Instance::where('id', $instance->id)
                    ->update($validatedData);

        return redirect('dashboard/instances')->with('success', "$instance->name has been Edited!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instance  $instance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instance $instance)
    {
        Instance::destroy($instance->id);
        return redirect('dashboard/instances')->with('success', "Instance $instance->name, Has been Delete! ");
    }

    /**
     * Slug Automatic form input name
     *
     * @param $instance Slug
     */
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Instance::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
