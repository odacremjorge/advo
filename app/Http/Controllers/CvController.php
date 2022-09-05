<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use App\Models\Player;
use App\Models\Game;
use App\Models\Race;
use App\Models\Team;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $players=Player::select('players.id','teams.name_team','name_player','date_birth','ci_player', 'category_player','picture_player','condition_player')
        ->join('teams','players.team_id','=','teams.id')
        ->get();
        return view('cv.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //

        $rec = Cv::select(
            'cvs.id',
            'height_player',
            'position_usual',
            'scope1',
            'scope2',
            'cvs.created_at'
            )
        ->join('players','cvs.player_id','=','players.id')
        ->where('player_id',$id)->get();

        $players = Player::findOrFail($id);
        return view('cv.create', compact('players', 'rec'));
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
        Cv::create([
            'height_player'=>$request->Estatura,
            'position_usual'=>$request->Posicion,
            'scope1'=>$request->Ataque,
            'scope2'=>$request->Bloqueo,
            'player_id'=> $request->player_id,
    
                 
                        
        ]);
        return redirect('/cv/create/'.$request->player_id)->with('Mensaje', 'HEY, progreso creado satisfactoriamente!!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function show(Cv $cv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function edit(Cv $cv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cv $cv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cv $cv)
    {
        //
        $cv->delete();
        return redirect()->back()->with('Mensaje', 'HEY, Registro de progreso eliminado satisfactoriamente!!!');
    }
    public function cvPDF($id)
    {
              
       $players=Player::findOrFail($id);
       
       $date_age = Carbon::createFromDate($players->date_birth)->age;

       $rec = Game::select(
        'games.id',
        'name_game',
        'date_game',
        'result_game',
        'parcial_game',
        'position_game',
        'dpA',
        'pA',
        'nA',
        'dnA',
        'neuA',
        'dpR',
        'pR',
        'nR',
        'dnR',
        'neuR',
        'dpB',
        'pB',
        'nB',
        'dnB',
        'dpS',
        'pS',
        'nS',
        'dnS',
        'neuS',
        'dpD',
        'pD',
        'nD',
        'dnD',
        'neuD',
        'dpC',
        'pC',
        'nC',
        'dnC',
        'neuC'
    )
    ->join('players','games.player_id','=','players.id')
    ->where('player_id',$id)->get();

    $rec1 = Cv::select(
        'cvs.id',
        'height_player',
        'position_usual',
        'scope1',
        'scope2',
        'cvs.created_at',
        
        )
    ->join('players','cvs.player_id','=','players.id')
    ->where('player_id',$id)->get();

    $tra=Team::findOrFail($players->team_id);
       $name=$tra->name_team;
       
       $rec2 = Race::select('races.id','category_race','year_race','position_race','type_race','team_race')
       ->join('players','races.player_id','=','players.id')
       ->where('player_id',$id)->get();

       
        $pdf = PDF::loadView('cv.cvPDF',['players'=>$players,'date_age'=>$date_age,'rec'=>$rec,'rec1'=>$rec1,'name'=>$name,'rec2'=>$rec2]);
        
        return $pdf->stream('cv.cvPDF',array('Attachment'=>false));
       
    }
}
