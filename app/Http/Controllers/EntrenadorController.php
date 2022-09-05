<?php

namespace App\Http\Controllers;

use App\Models\Entrenador;
use App\Models\record as Historial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PDF;
use Intervention\Image\ImageManagerStatic as Image;


class EntrenadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $entrenadors = Entrenador::all();
        return view('coach.index', compact('entrenadors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('coach.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //guarda archivo
/*
        $path_img = 'profile_pic';

        $this->validate($request, [
            'Photography' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $file = $request->file('Photography');
        $file_name = time() . '.png';
        try {
            Storage::disk('public')->put($path_img . '/' . $file_name, File::get($file));
        } catch (\Exception $exception) {
            return response('error', 400);
        }
        */
        //

        $path_img = 'profile_pic';
        $file = $request->file('Photography');
        //obtenemos el nombre del archivo
        $nombre =  time()."_".$file->getClientOriginalName();
        //indicamos que queremos guardar un nuevo archivo en el disco local
        Storage::disk('public')->put($path_img . '/' .$nombre,  File::get($file));
        
        //guardar datos
        Entrenador::create([
            'name' => $request->Name,
            'category' => $request->Category,
            'ci' => $request->CI,
            'phone' => $request->Phone,
            'photography' => $nombre,
            'age' => $request->Age,

        ]);
        return redirect('/coach')->with('Mensaje', 'HEY, Entrenador creado satisfactoriamente!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entrenador  $entrenador
     * @return \Illuminate\Http\Response
     */
    public function show(Entrenador $entrenador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entrenador  $entrenador
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $coach = Entrenador::findOrFail($id);
        return view('coach.edit', ['coach' => $coach]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entrenador  $entrenador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //guarda archivo

      
        $path_img = 'profile_pic';
        $file = $request->file('Photography');
        //obtenemos el nombre del archivo
        $nombre =  time()."_".$file->getClientOriginalName();
        //indicamos que queremos guardar un nuevo archivo en el disco local
        Storage::disk('public')->put($path_img . '/' .$nombre,  File::get($file));

        $coach = Entrenador::findOrFail($id);
            $coach->name = $request->Name;
            $coach->category = $request->Category;
            $coach->ci = $request->CI;
            $coach->phone = $request->Phone;
            $coach->photography = $nombre;
            $coach->age = $request->Age;
            $coach->save();
            return redirect('/coach')->with('Mensaje', 'HEY, Entrenador actualizado satisfactoriamente!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entrenador  $entrenador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entrenador $coach)
    {
        //
        $coach->delete();
        return redirect()->back()->with('Mensaje', 'HEY, Entrenador eliminado satisfactoriamente!!!');
       
    }
    public function coachPDF($id)
    {
       
        $rec = Historial::select('records.id','category_type','gender','year','position','type_championship','team_dep')
        ->join('entrenadors','records.entrenador_id','=','entrenadors.id')
        ->where('entrenador_id',$id)->get();

        $coaches=Entrenador::findOrFail($id);
        $pdf = PDF::loadView('coach.coachPDF',['coaches'=>$coaches, 'rec' => $rec]);
        
        return $pdf->stream('coach.coachPDF',array('Attachment'=>false));
       
    }
}
