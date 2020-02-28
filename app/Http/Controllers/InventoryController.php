<?php

namespace App\Http\Controllers;

use App\Inventory;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInventoryRequest;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $productos = Inventory::all();
        return view('inventory.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInventoryRequest $request)
    {
        $inventory = new Inventory();
        $inventory->code = $request->input('code');
        $inventory->name = $request->input('name');
        $inventory->amount = $request->input('amount');
        $inventory->description = $request->input('description');
        $inventory->slug = $request->input('name');
        $inventory->save();

        return redirect('inventory')->with('success', 'Producto agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $producto = Inventory::where('slug', '=', $slug)->firstOrFail();
        return view('inventory.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        // $producto = Inventory::find($slug);
        $producto = Inventory::where('slug', '=', $slug)->firstOrFail();
        return view('inventory.edit', compact('producto'));
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
        // $producto = Inventory::find($id);
        $producto = Inventory::where('slug', '=', $slug)->firstOrFail();
        $producto->fill($request->all());
        $producto->save();
        // return 'updated';
        return redirect('inventory')->with('status', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $producto = Inventory::where('slug', $slug)->first();
        if ($producto != null){
            $producto->delete();
            return redirect('inventory')->with('message', 'Producto eliminado correctamente');
        }
        return redirect('inventory');
    }
}
