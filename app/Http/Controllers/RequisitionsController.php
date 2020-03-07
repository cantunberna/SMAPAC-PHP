<?php

namespace App\Http\Controllers;

use App\PivotDepartments;
use App\PivotRequisition;
use App\PivotRequesteds;
use App\RelationsRequisitions;
use App\Requisition;
use App\Requested;
use App\Coordination;
use App\Department;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequisitionRequest;
use App\Http\Requests\LoadRequisitionRequest;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class RequisitionsController extends Controller
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
        if(auth()->check())
        {
            if ($users = auth()->user()->isAdmin())
            {
               // $requisitions = PivotRequisition::all();
                $requisitions = PivotRequisition::all()->where('status','=','0');
            }
            elseif($users = auth()->user()->isCoor()) {
                $user = auth()->user()->id;
                $coordination = Coordination::all()->where('user_id', '=', $user);
                foreach ($coordination as $coor) {
                    $idcoor = $coor->id;
                }
                $requisitions = PivotRequisition::all()
                    ->where('coordination_id','=',$idcoor)
                    ->where('status','=','0');
                 }
            else
                {
                    if(auth()->user()->isTitular()) {
                        $user = auth()->user()->id;
                   $requisitions = PivotRequisition::all()->where('user_id','=',$user)->where('status','=','0');
                        //   $requisitions = PivotRequisition::all()->where('user_id','=', $user);
                     //   $requisitions = Requisition::all()->where('status', '=', '0');
                        //$user = auth()->user()->id;
                        //$requisitions = PivotRequisition::all()->where('user_id','=', $user);
                    }
                }
        }
   //$requisitions = DB::table('requisitions')->where('status', '=', '0')->get();
      //   return $requisitions = Requisition::whereRaw('status = 1')->firstOrFail();
       //$requisitions = Requisition::with(['coordinations','departments'])->get();
        return view('requisitions.index', compact('requisitions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return Requisition::with('requesteds')->get();

        if(auth()->check())
        {
            if ($users = auth()->user()->isAdmin())
            {
                $coor  = Coordination::all();
            }elseif ($users = auth()->user()->isCoor())
            {
                $users = auth()->user()->id;
                $coor = Coordination::all()->where('user_id','=', $users);
              //  $depar = Department::all()->where('user_id','=',$users);
            }
            else{
                 $users = auth()->user()->id;
                 $depar = Department::all()->where('user_id','=',$users);
                foreach ($depar as $dep)
                {
               $iddepartment=$dep->id;
                }
               $idpivot = PivotDepartments::all()->where('department_id','=', $iddepartment);
                    foreach ($idpivot as $pivot)
                    {
              $idcoor =  $pivot->coordination_id;
                    }
               $coor = Coordination::all()->where('id','=',$idcoor);
                $requi = PivotRequisition::all()->where('user_id','=', $users);
                $requi = $requi->last();
                    if ($requi === null)
                    {
                        $requi = new Requisition();
                        $countreq = $requi->accountant = '001';
                    }else
                    {
                            $countreq = $requi->accountant;
                        if (($countreq <= '008'))
                        {
                            $countreq = $countreq+ '001';
                            $countreq = '00'. $countreq;
                        }else{
                            $countreq = $countreq+ '001';
                            $countreq = '0'. $countreq;
                        }
                    }
                    /*elseif($requi <= '009'){
                        foreach ($requi as $req)
                        {
                            return $req->accountant;
                        }


                    }*/
            }

        }
        //  $requisitions = PivotRequisition::all()->where('requisition_id','=', $id);
        // $user = User::all();
       // return  $user = auth()->user();
        //$requisitions = Requisition::with(['coordinations','departments'])->get();
        return view('requisitions.create', compact('coor','depar','requi', 'countreq', 'users'));
        // $requisitions = RequisitionConfig::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequisitionRequest $request)
    {
        //  $request->all();
        //$user = User::create($request->all());
       $requisition = new Requisition();
       $requisition->folio = $request->input('folio');
       $requisition->added_on = $request->input('added_on');
       $requisition->management = $request->input('management');
       $requisition->administrative_unit = $request->input('administrative_unit');
       $requisition->required_on = $request->input('required_on');
       $requisition->issue = $request->input('issue');
       $requisition->remark = $request->input('remark');
        $requisition->status = 0;
        $requisition->save();

            $requesteds = new Requested();

              foreach ($request->departure as $item=>$v) {
                  $data2=array(
                        'departure' => $request->departure[$item],
                    'quantity' => $request->quantity[$item],
                    'unit' => $request->unit[$item],
                    'concept' => $request->concept[$item],


                );
             $requesteds = Requested::insert($data2);
            //  $requisition->requesteds()->attach($requesteds);

             //$requisition->requesteds()->attach($requesteds);
            }

        // $requesteds->departure = $request->input('departure');
        // $requesteds->quantity = $request->input('quantity');
        // $requesteds->unit = $request->input('unit');
        // $requesteds->concept = $request->input('concept');
       // return $departure ." ". $quantity ." ". $unit ." ". $concept ;


        $requisitions = $requisition->coordinations()->attach($request->input('coordination_id'), ['department_id' => $request->input('department_id'),'accountant' => $request->input('accountant'),'user_id'=> $request->input('user_id')]);



        return redirect()->route('requisitions.index')->with('success','Requisición almacenada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


            $requisitions = Requisition::findOrFail($id);
        $pivot = PivotRequisition::all()->where('requisition_id','=',$id);
         $requesteds = PivotRequesteds::with('requesteds')->where('requisition_id','=',$id)->get();
    //$requesteds = PivotRequesteds::all()->where('requisition_id','=', $id);
            foreach ($pivot as $id)
            {
                if($id->department_id)
                {
                  $department = $id->departments->name;
                }
                if($id->user_id)
                {
                  $nametitular = $id->users;
                  $roltitular = $id->users->roles;
                }
                if($id->coordination_id)
                {
                     $coordination = $id->coordinations->name;
                  // $coordinador = $id->users;
                }
            }

//  $requisitions = PivotRequisition::all()->where('requisition_id','=', $id);
    // $requisitions = DB::table('assigned_requisitions')->where('requisition_id','=', $id)->get();

  //   $programa = Requisition::findOrFail($id)->get()->pluck('concept');
     //   $requisitions = DB::table('requisitions')->get();
  //  return  $concept = DB::table('requisitions')
    //    ->where('id', '=', $id)
      //  ->pluck('departure', 'id' );
     //$concept = explode(',', $concept);
       //  $departure = DB::table('requisitions')->value('departure');
     //    $departure = collect($departure);
       //  $collect= collect([$concept]);
//         $collect->dd();
        // $matrix = $collect->crossJoin($departure);
         //return  $matrix->all();
     return view('requisitions.show', compact('requisitions','requesteds','department','nametitular','roltitular','coordination'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requisitions = Requisition::findOrFail($id);
        return view('requisitions.edit', compact('requisitions'));
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
        Requisition::destroy($id);
        // $requisition = Requisition::findOrFail($id);
        // $requisition->delete();
           $pivotreq = PivotRequisition::all()->where('requisition_id','=', $id);
        foreach ($pivotreq as $p)
        {
           $p = $p->id;
        }
        PivotRequisition::destroy($p);
      //  $pivotreq->delete();

        return back();
    }

    public function exportpdf()
    {
        $requisitions = Requisition::all();
        $pdf = PDF::loadView('requisitions.show',compact('requisitions'));
        return $pdf->download('req.pdf');
    }

    public  function load($id)
    {
         //$requisitions = DB::table('requisitions')->where('id','=', $id)->where('img_req','=','')->get();
          $requisitions = Requisition::findOrFail($id);
        //return $requisitions->file_req;
       //  return $requisitions;
         if (is_null($requisitions->file_req)) {
               //return 'No Existe imagen' ;
             $requisitions = Requisition::findOrFail($id);
             return view('requisitions.load', compact('requisitions'));
         }else{
               // return 'Existe imagen';
               $requisitions = Requisition::findOrFail($id);
            return view('requisitions.show_authorized', compact('requisitions'));
         }
    }

    public function upload(LoadRequisitionRequest $request,  $id)
    {
       // return $request;
         $requisition = Requisition::findOrFail($id);

      if($request->hasFile('img_req')){
            $file = $request->file('img_req');
            $nameimage = 'req'.time().'.png';
             $image = base64_encode(file_get_contents($request->file('img_req')));
             $file->move(public_path().'/images/requisitions/', $nameimage);
      }

        $requisition->img_req = $nameimage;
        $requisition->file_req = $image;
        $requisition->status = 1;
        $requisition->save();
        $pivotreq = PivotRequisition::where('requisition_id','=',$id)->first();
        $pivotreq->status = '1';
        $pivotreq->save();
        //$requisitions->img_req =
      // $requisitions->update($request->only('img_req','email'));

        return redirect('requisitions/authorized')->with('status', 'Requisición actualizada');
    }

    public function authorized()
    {
        if(auth()->check())
        {
            if ($users = auth()->user()->isAdmin())
            {
                // $requisitions = PivotRequisition::all();
                // $requisitions = Requisition::all()->where('status','=','1');
                $requisitions = PivotRequisition::all()->where('status','=','1');
            }
            elseif($users = auth()->user()->isCoor()) {
                $user = auth()->user()->id;
                $coordination = Coordination::all()->where('user_id', '=', $user);
                foreach ($coordination as $coor) {
                    $idcoor = $coor->id;
                }
                $requisitions = PivotRequisition::all()
                    ->where('coordination_id','=',$idcoor)
                    ->where('status','=','0');
            }
            else
            {
                if(auth()->user()->isTitular()) {
                    $user = auth()->user()->id;
                    // $requisitions = Requisition::all()
                    //     ->where('status','=','1');
                    $requisitions = PivotRequisition::all()->where('user_id','=',$user)->where('status','=','1');
                }
            }
        }

        return view('requisitions.authorized', compact('requisitions'));
    }

    public  function show_authorized($id)
    {
        $requisitions = Requisition::findOrFail($id);

          if (is_null($requisitions->file_req)) {
            $requisitions = Requisition::findOrFail($id);
            return view('requisitions.load', compact('requisitions'));
         }else{
                 $requisitions = Requisition::findOrFail($id);
                 return view('requisitions.show_authorized', compact('requisitions'));
        //      return view('requisitions.load', compact('requisitions'));
         }

    }
}
