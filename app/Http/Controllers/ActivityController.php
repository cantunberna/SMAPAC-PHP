<?php

namespace App\Http\Controllers;
use App\Department;
use App\Mir;
use App\Activity;
use Illuminate\Http\Request;
use App\Exports\MirsExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ActivityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('roles:admin,coordinador');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::all();
        return view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $components = Mir::all();
        $departments = Department::all();
        return view('activities.create', compact('departments', 'components'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $activity = new Activity();
        $activity->component_id = $request->input('component_id');
        $activity->department_id = $request->input('department_id');
        $activity->activity =  $request->input('activity');
        $activity->amount =  $request->input('amount');

        if (Input::has('status') == 'All') {
            DB::table('mirs')->where('component','=',$request->input('component_id'))->decrement('fedresource', $request->input('amount'));
        }else{
            DB::table('mirs')->where('component','=',$request->input('component_id'))->decrement('ownresource', $request->input('amount'));
        }

        $activity->trianual = $request->input('trianual');
        $activity->fist_year = $request->input('fist_year');
        $activity->second_year = $request->input('second_year');
        $activity->third_year = $request->input('third_year');
        $activity->indicator = $request->input('indicator');
        $activity->formula = $request->input('formula');
        $activity->frequency = $request->input('frequency');
        $activity->measure = $request->input('measure');
        $activity->prog_indicator = $request->input('prog_indicator');
        $activity->prog_one = $request->input('prog_one');
        $activity->prog_two = $request->input('prog_two');
        $activity->prog_three = $request->input('prog_three');
        $activity->prog_four = $request->input('prog_four');
        $activity->real_indicator = $request->input('real_indicator');
        $activity->real_one = $request->input('real_one');
        $activity->real_two = $request->input('real_two');
        $activity->real_three = $request->input('real_three');
        $activity->real_four = $request->input('real_four');
        $activity->total = $request->input('total');
        $activity->verification = $request->input('verification');
        $activity->supposed = $request->input('supposed');
        $activity->save();

        return redirect('activities')->with('success', 'Actividad agregada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activities = Activity::where('id', '=', $id)->firstOrFail();
        $components = Mir::all();
        $departments = Department::all();
        return view('activities.edit', compact('activities', 'components', 'departments'));
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
        $activities = Activity::where('id', '=', $id)->firstOrFail();
        $activities->fill($request->all());
        $activities->save();

        return redirect('activities')->with('status', 'Actividad actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activities = Activity::where('id', $id)->first();
        if ($activities != null){
            $activities->delete();
            return redirect('activities')->with('message', 'Actividad eliminada correctamente');
        }

        // DB::table('mirs')->where('component','=',$request->input('component_id'))->increment('fedresource', $request->input('amount'));

        // DB::table('mirs')->where('component','=',$request->input('component_id'))->increment('ownresource', $request->input('amount'));

        return redirect('activities');
    }

    // Export Excel
    public function exportExcel()
    {
        // Excel::create('Bids-' . date("Y/m/d"), function($excel) {
        //     $excel->sheet('Favourites', function($sheet) {
        //         $comments = Activity::select('component_id', 'activity')->sortBy("activity")->get();
        //         $sheet->fromModel($comments);
        //     });
        // })->download('xls');

        return Excel::download(new MirsExport, 'activities.xlsx');
    }

    public function exportpdf()
    {
        $activities = Activity::sortBy("component_id")->get();
        $pdf = PDF::loadView('pdf.actividades', compact('activities'));

        return $pdf->download('listado.pdf');
    }

}
