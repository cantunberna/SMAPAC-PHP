<?php

namespace App\Http\Controllers;

use App\Coordination;
use App\Department;
use App\PivotDepartments;
use App\Role;
use App\User;
use App\Http\Requests\StoreDepartmentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use test\Mockery\AllowsExpectsSyntaxTest;

class DepartmentController extends Controller
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
                // $users = User::all();
                //  $departamentos =PivotDepartments::all();
                //  $titular = Department::all();
                $departamentos = Department::all();
            }
            elseif ($users = auth()->user()->isCoor()){
                $users = auth()->user()->id;
                $coordination = Coordination::all()->where('user_id','=', $users);
                foreach($coordination as $coor)
                {
                    $idcoor = $coor->id;
                }
                $departamentos = PivotDepartments::all()->where('coordination_id','=',$idcoor);
                // foreach ($departamentos as $dep)
                // {
                //      $iddep = $dep->department_id;
                // }
                // $departamentos = Department::all()->where('id', '=', $iddep);
            }else{
                return 'soy un titular';
        }

        }

     //   $users = User::all();
      //  $departamentos = Department::all()->where('');
 //   $departamentos = DB::table('assigned_departments')->where('coordination_id','=',$idcoor)->get();

            return view('departments.index', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $coordinations = Coordination::all();
        // $users = User::whereHas('roles')->where('name','=','titular')->first() ;
      // $users = DB::table('assigned_roles')->where('role_id','=','3' )->get();
        $users = Role::with('user')->where('name','=','titular')->get();
            // $app = Usuarios::where('UsuarioID', '>', 1)
            // ->join('OpcionesUsuarios', 'OpcionUsuarioID', '=', 'UsuarioID')
            // ->select('Usuarios.UsuarioID', 'OpcionesUsuarios.OpcionUsuarioID')
            // ->get();
        //     return $user = Department::where('user_id','>',1)
        //     ->join('users','id','=', 'user_id')
        //     ->select('users.id','departments.user_id')
        //     ->get();
        // //    $users = User::select('id')->get();
        // foreach ($users as $u) {
        //     return $u->id;
        // }
        //  $user_id =   Department::select('user_id')->get();
        //  foreach ($user_id as $u) {
        //        $user_id = $u->user_id;
        //  }
        return view('departments.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartmentRequest $request)
    {
     //   return $request;
        $departamentos = Department::create($request->all());

        // $departamentos                  = new Department();
        // $departamentos->name            = $request->input('name');
        // $departamentos->slug            = $request->input('name');
        // $departamentos->user_id         =  $request->input('user_id');
        // $departamentos->coordination_id = $request->input('coordination_id');
        // $departamentos->save();

        return redirect('departments')->with('success', 'Departamento agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $departamento = Department::where('slug', '=', $slug)->firstOrFail();
        return view('departments.show', compact('departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $departamento = Department::where('slug', '=', $slug)->firstOrFail();
        return view('departments.edit', compact('departamento'));
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
        $departamento = Department::where('slug', '=', $slug)->firstOrFail();
        $departamento->fill($request->all());
        $departamento->save();
        return redirect('departments')->with('status', 'Departamento actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $departamento = Department::where('slug', $slug)->first();
        if ($departamento != null) {
            $departamento->delete();
            return redirect('departments')->with('message', 'Departamento eliminado correctamente');
        }
        return redirect('departments');
    }
}
