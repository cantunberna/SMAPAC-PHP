<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requisition;
use App\Requested;
use App\Department;
use App\Purchase;
use App\Quote;
use App\Product;
use App\PivotRequisition;
use App\PivotRequesteds;
use App\PivotQuotes;
use App\PivotProducts;
use Illuminate\Support\Facades\DB;


class PurchasedController extends Controller
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
                $purchases = PivotProducts::all();
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
            // $requisition = PivotRequisition::all()->where('department_id','=',$id)->where('status','=', "2");
        //   return  $purchases = PivotProducts::with(['purchases','products'])->get();
               $purchases = PivotProducts::all()->where('department_id','=',$id);
                    // $quotes = Quote::all();

                }
            }
        }
        return view('purchases.index',compact('purchases'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('purchases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //   $request->all();
       $purchase = new Purchase();
       $purchase->requisition_id = $request->input('requisition_id');
       $purchase->coordination_id = $request->input('coordination_id');
       $purchase->department_id = $request->input('department_id');
       $purchase->save();

       $quotes = Quote::where('requisition_id','=', $request->input('requisition_id'))->first();
       $quotes->status =  '1';
       $quotes->save();
       $quotes = PivotQuotes::where('requisition_id','=', $request->input('requisition_id'))->first();
       $quotes->status =  '1';
       $quotes->save();
       $products = new PivotProducts();

        $id = $products->id_requesteds = implode(",", $request->id_requesteds);
       foreach($request->id_requesteds as $item=>$v){
            $data3=array(
                'products_id' => $request->id_requesteds[$item],
                // 'quantity' => $request->quantity[$item],
                // 'unit' => $request->unit[$item],
                // 'concept' => $request->concept[$item]
            );
            foreach ($data3 as $d) {
               $d;
            }
            // $products = PivotProducts::insert();
            // return $products[$data3;


            // $products = Product::firstOrCreate($products[$data3]);
       }

       $purchase->departaments()->attach($request->input('department_id'),['products_id' => $id]);

    //    $requisition->save();



    return redirect()->route('purchased.index')->with('success','Compra almacenada');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $purchase = Purchase::findOrFail($id;
    //    return $products = PivotProducts::with('purchases')->where('purchase_id','=', $id)->first();

          $products = DB::table('assigned_products')->where('purchase_id','=',$id)->select('products_id')->get();

     foreach($products as $p    ) {
                $id = explode(',',$p->products_id);
        }
            $name = array('products');
            $requesteds = Requested::all()->where('id','=',$id);
        // foreach ($products as $p => $products_id) {
        //  return   $id = explode(',',$p);

        // }

        return   $products = PivotProducts::with(['purchases','requesteds'])->where('purchase_id','=',$id)->get();
        // $products = PivotProducts::all()->where('purchase_id','=', $id);
        return view('purchases.show',compact('products'));
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
    return view('purchases.edit', compact('requisitions','requesteds','department','nametitular','roltitular','coordination'));
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


    public  function load($id)
    {
         //$requisitions = DB::table('requisitions')->where('id','=', $id)->where('img_req','=','')->get();
          $purchase = Purchase::findOrFail($id);
        //return $requisitions->file_req;
       //  return $requisitions;
         if (is_null($purchase->img_bill)) {
               //return 'No Existe imagen' ;
               $purchase = Purchase::findOrFail($id);
             return view('purchases.load', compact('purchase'));
         }else{
               // return 'Existe imagen';
            //    $purchase = Purchase::findOrFail($id);
            // return view('purchases.index', compact('requisitions'));
         }
    }

    public function upload(Request $request,  $id)
    {
       // return $request;
         $purchase = Purchase::findOrFail($id);

         if($request->hasFile('img_req'))
         {
          $purchase->img_bill = $request->file('img_req')->store('/public/documents/facturas');
         }
        $purchase->status = "1";
        // $purchase->save();

        $pivotproduct = PivotProducts::where('purchase_id','=',$id)->first();
        $pivotproduct->status = '1';
        $pivotproduct->save();

           $pivotproduct = PivotProducts::with('requesteds')->where('purchase_id','=',$id)->first();
                $departure =  $pivotproduct->requesteds->departure;
                $quantity =  $pivotproduct->requesteds->quantity;
                $unit =  $pivotproduct->requesteds->unit;
                $concept =  $pivotproduct->requesteds->concept;

                $products = new Product();
                $products->departure = $departure;
                $products->quantity = $quantity;
                $products->unit = $unit;
                $products->concept = $concept;
                $products->save();

        return redirect(route('purchased.index'))->with('status', 'Factura actualizada actualizada');
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
