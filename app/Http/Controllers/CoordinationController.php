<?php

namespace App\Http\Controllers;

use App\Coordination;
use App\Department;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCoordinationRequest;
use Illuminate\Support\Facades\DB;

class CoordinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:admin,coordinador');
    }


    public function index()
    {
        if(auth()->check())
        {
            if ($users = auth()->user()->isAdmin())
            {
                $coordinaciones  = Coordination::all();
            }elseif ($users = auth()->user()->isCoor){
                $users = auth()->user()->id;
                $coordinaciones = Coordination::all()->where('user_id','=', $users);
            }else{
                return 'soy un titular';
            }

        }
        return view('coordinations.index', compact('coordinaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $coordinacion = Coordination::all();
         foreach ($coordinacion as $c) {
             $c->user_id;
         }
         $users = Role::with('user')->where('name','=','coordinador')->get();
      /// return $users = User::with('roles')->get();
       // $users = DB::table('assigned_roles')->where('role_id','=','2' )->get();
        $departments = Department::pluck('name', 'id');
        // $departments = Department::all();
        return view('coordinations.create', compact('users', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoordinationRequest $request)
    {
        $coordination = new Coordination();
        $coordination->name = $request->input('name');
        $coordination->slug = $request->input('slug');
        $coordination->user_id = $request->input('user_id');
        $coordination->save();

        //$coordination = Coordination::create($request->all());
        $coordination->departments()->attach($request->departments);
        // Coordination::create($request->all());

        return redirect('coordinations')->with('success', 'Coordinación agregada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $coordinacion = Coordination::where('slug', '=', $slug)->firstOrFail();
        return view('coordinations.show', compact('coordinacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {

        $coordinacion = Coordination::where('slug', '=', $slug)->firstOrFail();
      // return $users = User::all();
        $departments  = Department::pluck('name','id');
        return view('coordinations.edit', compact('coordinacion','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCoordinationRequest $request, $slug)
    {

        $coordinacion = Coordination::where('slug', '=', $slug)->firstOrFail();
        $coordinacion->fill($request->all());
        $coordinacion->departments()->sync($request->departments);
        $coordinacion->save();

        return redirect('coordinations')->with('status', 'Coordinación actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $coordinacion = Coordination::where('slug', $slug)->first();
        if ($coordinacion != null){
            $coordinacion->delete();
            return redirect('coordinations')->with('message', 'Coordinación eliminada correctamente');
        }
        return redirect('coordinations');
    }
}
