<?php

namespace App\Http\Controllers;
use App\Mir;
use Illuminate\Http\Request;

class MirController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:admin,titular,coordinador');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $components = Mir::all();
        return view('mir.index', compact('components'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mir.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mir = new Mir();
        $mir->component = $request->input('component');
        $mir->objective = $request->input('objective');
        $mir->fedresource = $request->input('fedresource');
        $mir->ownresource = $request->input('ownresource');
        $mir->trianual = $request->input('trianual');
        $mir->nineteen = $request->input('nineteen');
        $mir->twenty = $request->input('twenty');
        $mir->twenty_one = $request->input('twenty_one');
        $mir->slug = $request->input('component');
        $mir->save();

        return redirect('mir')->with('success', 'Componente agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $component = Mir::where('slug', '=', $slug)->firstOrFail();
        return view('mir.show', compact('component'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $component = Mir::where('slug', '=', $slug)->firstOrFail();
        return view('mir.edit', compact('component'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $component = Mir::where('slug', '=', $slug)->firstOrFail();
        $component->fill($request->all());
        $component->save();
        return redirect('mir')->with('status', 'Componente actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $component = Mir::where('slug', $slug)->first();
        if ($component != null){
            $component->delete();
            return redirect('mir')->with('message', 'Componente eliminado correctamente');
        }
        return redirect('mir');
    }
}
