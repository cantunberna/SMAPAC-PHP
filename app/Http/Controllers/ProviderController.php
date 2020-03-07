<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProviderRequest;

class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:admin,titular,coordinador');
    }

    public function index()
    {
        $proveedores = Provider::all();
        return view('providers.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('providers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProviderRequest $request)
    {
        $proveedor = new Provider();
        $proveedor->name = $request->input('name');
        $proveedor->rfc = $request->input('rfc');
        $proveedor->address = $request->input('address');
        $proveedor->telephone = $request->input('telephone');
        $proveedor->slug = $request->input('name');
        $proveedor->save();

        return redirect('providers')->with('success', 'Proveedor agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $proveedor = Provider::where('slug', '=', $slug)->firstOrFail();
        return view('providers.show', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $proveedor = Provider::where('slug', '=', $slug)->firstOrFail();
        return view('providers.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProviderRequest $request, $slug)
    {
        $proveedor = Provider::where('slug', '=', $slug)->firstOrFail();
        $proveedor->fill($request->all());
        $proveedor->save();
        return redirect('providers')->with('status', 'Proveedor actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $proveedor = Provider::where('slug', $slug)->first();
        if ($proveedor != null){
            $proveedor->delete();
            return redirect('providers')->with('message', 'Proveedor eliminado correctamente');
        }
        return redirect('providers');
    }
}
