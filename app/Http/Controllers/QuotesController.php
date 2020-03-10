<?php

namespace App\Http\Controllers;

use App\Provider;
use App\Requisition;
use App\Department;
use App\PivotRequisition;
use App\PivotQuotes;
use App\Quote;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuoteRequest;
class QuotesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:admin,titular,coordinador');
    }


    public function index()
    {

        if(auth()->check())
        {
            if ($users = auth()->user()->isAdmin())
            {
                 $quotes = PivotQuotes::all()->where('status','=','0');
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
                $department =  Department::all()->where('user_id','=',$user);
                    foreach ($department as $id) {
                     $id =  $id->id;
                    }
            //   return PivotQuotes::with(['departments','requisitions','quotes'])->get();
        //   return  $requisition = PivotRequisition::all()->where('department_id','=',$id)->where('status','=', "2");
           $quotes = PivotQuotes::all()->where('department_id','=',$id)->where('status','=','0');
                    // $quotes = Quote::all();
                }
            }
        }
       // $requisitions = Requisition::all()
                        // ->where('status','=','1');
    // return $requisitions = PivotRequisition::all()->where('user_id','=',$user)->where('status','=','1');

                    return view('quotes.index',compact('quotes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quotes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuoteRequest $request)
    {

    //   return $quotes = $request->all();
       // $quotes = Quote::create( $request->all() );
       $quotes = new Quote();

        if($request->hasFile('prov_one_img'))
        {
           $quotes->prov_one_img = $request->file('prov_one_img')->store('/public/quotes');
          //  $name_one = 'cot'.time();
        }
        if($request->hasFile('prov_two_img'))
        {
            $quotes->prov_two_img = $request->file('prov_two_img')->store('/public/quotes');
        }
        if($request->hasFile('prov_three_img'))
        {
            $quotes->prov_three_img = $request->file('prov_three_img')->store('/public/quotes');
        }

       // $quotes->save();

       $quotes->requisition_id = $request->input('requisition_id');
       $quotes->prov_id_one = $request->input('prov_id_one');
       $quotes->prov_id_two = $request->input('prov_id_two');
       $quotes->prov_id_three = $request->input('prov_id_three');
    //    $quotes->prov_one_img = $request->input('prov_one_img');
    //    $quotes->prov_two_img = $request->input('prov_two_img');
    //    $quotes->prov_three_img = $request->input('prov_three_img');

       $quotes->save();

     $quotes = $quotes->departments()->attach($request->department_id,['requisition_id' => $request->input('requisition_id')]);
        //  $user->roles()->attach($request->roles);
       $req =  $request->input('requisition_id');

        $requisition = Requisition::findOrFail($req);
        $requisition->status = '2';
        $requisition->save();

        $pivotreq = PivotRequisition::where('requisition_id','=',$req)->first();
        $pivotreq->status = '2';
        $pivotreq->save();

       //

    //   dd($request->all());
      //  return $request->all();

        // }else if($request->hasFile('prov_two_img')) {
        //     $file_two = $request->file('prov_two_img');
        //     $name_two = 'cot'.time();
        //    // $image = base64_encode(file_get_contents($request->file('prov_twoo_img')));
        //     $file_two->move(public_path().'/quotes/pdf/', $name_two);
        // }else if($request->hasFile('prov_three_img')) {
        //     $file_three = $request->file('prov_three_img');
        //     $name_three = 'cot'.time();
        //    // $image = base64_encode(file_get_contents($request->file('prov_three_img')));
        //     $file_three->move(public_path().'/quotes/pdf/', $name_three);
        // }


        //    $quotes = new Quote();

        //    $quotes->requisition_id = $request->input('requisition_id');
        //    $quotes->prov_id_one = $request->input('prov_id_one');
        //    $quotes->prov_one_img = $name_one;
        //    $quotes->prov_id_one = $request->input('prov_id_two');
        //    $quotes->prov_two_img = $name_two;
        //    $quotes->prov_id_one = $request->input('prov_id_three');
        //    $quotes->prov_three_img = $name_three;
          // $quotes->prov_one_file = $image;
        //    $quotes->save();
        //$requisitions = $requisition->coordinations()->attach($request->input('coordination_id'), ['department_id' => $request->input('department_id'),'accountant' => $request->input('accountant'),'user_id'=> $request->input('user_id')]);
       // $requisition = Requisition::create($request->all());
        //$requisition->departments()->attach($request->department_id);
        return redirect()->route('quotes.index')->with('success','Cotizacion almacenada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $quotes = Quote::findOrFail($id);
        return view('quotes.show', compact('quotes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $requisition = Requisition::findOrFail($id);
          $requisitions = Requisition::findOrFail($id);
          $r = $requisitions->status;
            if ($r >= "2")
            {
                // return 'Se cumple el primer if';
                return redirect('quotes')->with('info', 'Cotizacion almacenada');                //  return view('quotes.show');
            }else
            {
             if (is_null($requisitions->file_req)) {
                        $requisitions = Requisition::findOrFail($id);
                        return view('requisitions.load', compact('requisitions'));
                }else{
                             $pivotreq = PivotRequisition::all()->where('requisition_id','=', $id);
                             foreach($pivotreq as $p){
                              $department_id = $p->department_id;
                             }
                            $requisition = Requisition::findOrFail($id);
                            $providers = Provider::all();
                            return view('quotes.edit',compact('requisition','providers','pivotreq','department_id'));
                        //  return view('requisitions.show_authorized', compact('requisitions'));
                    //      return view('requisitions.load', compact('requisitions'));
                    }
            }
    }

    public function addproviders(Request $request, $id)
    {
        $quotes = PivotQuotes::findOrFail($id);
        $providers = Provider::all();
        // return $quotes = PivotQuotes::with('quotes')->get();
        return view('quotes.addproviders',compact('quotes','providers'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreQuoteRequest $request, $id)
    {
          $request->all();
         $quote_id = $request->input('quote_id');

          $quotes = Quote::findOrFail($quote_id);
         if($request->hasFile('prov_one_img'))
        {
           $quotes->prov_one_img = $request->file('prov_one_img')->store('/public/quotes');
          //  $name_one = 'cot'.time();
        }
        if($request->hasFile('prov_two_img'))
        {
            $quotes->prov_two_img = $request->file('prov_two_img')->store('/public/quotes');
        }
        if($request->hasFile('prov_three_img'))
        {
            $quotes->prov_three_img = $request->file('prov_three_img')->store('/public/quotes');
        }

       // $quotes->save();

       $quotes->requisition_id = $request->input('requisition_id');
       $quotes->prov_id_one = $request->input('prov_id_one');
       $quotes->prov_id_two = $request->input('prov_id_two');
       $quotes->prov_id_three = $request->input('prov_id_three');
    //    $quotes->prov_one_img = $request->input('prov_one_img');
    //    $quotes->prov_two_img = $request->input('prov_two_img');
    //    $quotes->prov_three_img = $request->input('prov_three_img');

       $quotes->save();

    //  $quotes = $quotes->departments()->attach($request->department_id,['requisition_id' => $request->input('requisition_id')]);
        //  $user->roles()->attach($request->roles);
       $req =  $request->input('requisition_id');

        $requisition = Requisition::findOrFail($req);
        $requisition->status = '2';
        $requisition->save();

        $pivotreq = PivotRequisition::where('requisition_id','=',$req)->first();
        $pivotreq->status = '2';
        $pivotreq->save();

        return redirect()->route('quotes.index')->with('success','Cotizacion almacenada');
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
