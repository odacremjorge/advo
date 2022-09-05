<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Entrenador;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teams=Team::select('teams.id','entrenadors.name','name_team','category_max','personality', 'date_creation','logo','manager','phone_manager')
        ->join('entrenadors','teams.entrenador_id','=','entrenadors.id')
        ->get();
       
        //$teams = Team::all();
        
        return view('team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $entrenadors = Entrenador::all();
        return view('team.create', compact('entrenadors'));
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
        //guarda archivo
/*
        $path_img = 'logo';

        $this->validate($request, [
            'LogoClub' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $file = $request->file('LogoClub');
        $file_name = time() . '.png';
        try {
            Storage::disk('public')->put($path_img . '/' . $file_name, File::get($file));
        } catch (\Exception $exception) {
            return response('error', 400);
        }
        //
        */
        $path_img = 'logo';
        $file = $request->file('LogoClub');
        //obtenemos el nombre del archivo
        $nombre =  time()."_".$file->getClientOriginalName();
        //indicamos que queremos guardar un nuevo archivo en el disco local
        Storage::disk('public')->put($path_img . '/' .$nombre,  File::get($file));
       
        Team::create([
            'name_team' => $request->Name,
            'personality' => $request->Personeria,
            'date_creation' => $request->Date,
            'category_max' => $request->Category,
            'logo' => $nombre,
            'manager' => $request->Manager,
            'phone_manager' => $request->Phone,
            'entrenador_id' => $request->Coach,
            'user_id'=> Auth::user()->id,

        ]);
        return redirect('/team')->with('Mensaje', 'HEY, Club creado satisfactoriamente!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $entrenadors = Entrenador::all();
        $team = Team::findOrFail($id);
        return view('team.edit', ['team' => $team, 'entrenadors' => $entrenadors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         //guarda archivo
/*
         $path_img = 'logo';

         $this->validate($request, [
             'LogoClub' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);
 
         $file = $request->file('LogoClub');
         $file_name = time() . '.png';
         try {
             Storage::disk('public')->put($path_img . '/' . $file_name, File::get($file));
         } catch (\Exception $exception) {
             return response('error', 400);
         }
        */
        $path_img = 'logo';
        $file = $request->file('LogoClub');
        //obtenemos el nombre del archivo
        $nombre =  time()."_".$file->getClientOriginalName();
        //indicamos que queremos guardar un nuevo archivo en el disco local
        Storage::disk('public')->put($path_img . '/' .$nombre,  File::get($file)); 
         //
         $team = Team::findOrFail($id);
         $team->name_team = $request->Name;
         $team->personality = $request->Personeria;
         $team->date_creation = $request->Date;
         $team->category_max = $request->Category;
         $team->logo = $nombre;
         $team->manager = $request->Manager;
         $team->phone_manager = $request->Phone;
         $team->entrenador_id = $request->Coach;
         $team->user_id = Auth::user()->id;
         $team->save();
         return redirect('/team')->with('Mensaje', 'HEY, Club actualizado satisfactoriamente!!!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
        $team->delete();
        return redirect()->back()->with('Mensaje', 'HEY, Club eliminado satisfactoriamente!!!');
    }
}
