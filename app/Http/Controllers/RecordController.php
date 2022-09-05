<?php

namespace App\Http\Controllers;

use App\Models\record;
use App\Models\Entrenador;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $rec = record::select('records.id','category_type','gender','year','position','type_championship','team_dep')
        ->join('entrenadors','records.entrenador_id','=','entrenadors.id')
        ->where('entrenador_id',$id)->get();

        $coach = Entrenador::findOrFail($id);
        return view('record.index', ['coach' => $coach, 'rec' => $rec]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
           
        $rec=record::create([
    
            'category_type'=> $request->Category,
            'gender'=> $request->Gender,
            'year'=> $request->Year,
            'position'=> $request->Position,
            'type_championship'=> $request->Type,
            'team_dep'=> $request->Team,
            'entrenador_id'=> $request->entrenador_id,
         
                        
        ]);
        return redirect('/record/index/'.$request->entrenador_id)->with('Mensaje', 'HEY, Historial creado satisfactoriamente!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\record  $record
     * @return \Illuminate\Http\Response
     */
    public function show(record $record)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $recor = record::findOrFail($id);
        return view('record.edit', ['recor' => $recor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $recor = record::findOrFail($id);
        $recor->category_type = $request->Category;
        $recor->gender = $request->Gender;
        $recor->year = $request->Year;
        $recor->position = $request->Position;
        $recor->type_championship = $request->Type;
        $recor->team_dep = $request->Team;
        $recor->save();
        return redirect('/coach')->with('Mensaje', 'HEY, Historial actualizado satisfactoriamente!!!');
    
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(record $record)
    {
        //
        $record->delete();
        return redirect()->back()->with('Mensaje', 'HEY, Historial eliminado satisfactoriamente!!!');
    }
}
