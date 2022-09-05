<?php

namespace App\Http\Controllers;

use App\Models\Race;
use App\Models\Player;
use Illuminate\Http\Request;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $rec = Race::select('races.id','category_race','year_race','position_race','type_race','team_race')
        ->join('players','races.player_id','=','players.id')
        ->where('player_id',$id)->get();

        $player = Player::findOrFail($id);
        return view('race.index', ['player' => $player, 'rec' => $rec]);
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
        Race::create([

            'category_race'=> $request->Category, 
            'year_race'=> $request->Year,
            'position_race'=> $request->Position,
            'type_race'=> $request->Type, 
            'team_race'=> $request->Team, 
            'player_id'=> $request->player_id,
    
                 
                        
        ]);
        return redirect('/race/index/'.$request->player_id)->with('Mensaje', 'HEY, dato de trayectoria creada satisfactoriamente!!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function show(Race $race)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $recor = Race::findOrFail($id);
        return view('race.edit', ['recor' => $recor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $recor = Race::findOrFail($id);
        $recor->category_race = $request->Category;
        $recor->year_race = $request->Year;
        $recor->position_race = $request->Position;
        $recor->type_race = $request->Type;
        $recor->team_race = $request->Team;
        $recor->save();
        return redirect('/player')->with('Mensaje', 'HEY, Historial actualizado satisfactoriamente!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function destroy(Race $race)
    {
        //
        $race->delete();
        return redirect()->back()->with('Mensaje', 'HEY, Dato de trayectoria eliminado satisfactoriamente!!!');
    }
}
