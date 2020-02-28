<?php

namespace App\Http\Controllers;

use App\Provider;
use App\Requisition;
use Illuminate\Http\Request;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('quotes.index');
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
    public function store(Request $request)
    {
        return $request->all();
        if($request->hasFile('prov_one_img')){
               $file = $request->file('prov_one_img');
                $nameimage = 'cot'.time().'.png';
                $image = base64_encode(file_get_contents($request->file('prov_one_img')));
                $file->move(public_path().'/images/cotizaciones/', $nameimage);
                }
           $quotes = new Quote();

           $quotes->requisition_id = $request->input('requisition_id');
           $quotes->prov_id_one = $request->input('prov_id_one');
           $quotes->prov_one_img = $nameimage;
           $quotes->prov_one_file = $image;
           $quotes->save();
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
        return view('quotes.show');
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

          if (is_null($requisitions->file_req)) {
            $requisitions = Requisition::findOrFail($id);
            return view('requisitions.load', compact('requisitions'));
         }else{
                 $requisition = Requisition::findOrFail($id);
                 $providers = Provider::all();
                 return view('quotes.edit',compact('requisition','providers'));
               //  return view('requisitions.show_authorized', compact('requisitions'));
        //      return view('requisitions.load', compact('requisitions'));
         }

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
        //
    }
}
