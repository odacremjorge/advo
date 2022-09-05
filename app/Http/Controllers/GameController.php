<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Player;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
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

        
        $player = Player::findOrFail($id);
        return view('game.index', ['player' => $player, 'rec' => $rec]);
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
        Game::create([

            'name_game'=> $request->Partido,
            'date_game'=> $request->Fecha,
            'result_game'=> $request->Resultado, 
            'parcial_game'=> $request->Sets, 
            'position_game'=> $request->Posicion,
            'dpA'=> $request->dpa,
            'pA'=> $request->pa,
            'nA'=> $request->na,
            'dnA'=> $request->dna,
            'neuA'=> $request->neua,
            'dpR'=> $request->dpr,
            'pR'=> $request->pr,
            'nR'=> $request->nr,
            'dnR'=> $request->dnr,
            'neuR'=> $request->neur,
            'dpB'=> $request->dpb,
            'pB'=> $request->pb,
            'nB'=> $request->nb,
            'dnB'=> $request->dnb,
            'dpS'=> $request->dps,
            'pS'=> $request->ps,
            'nS'=> $request->ns,
            'dnS'=> $request->dns,
            'neuS'=> $request->neus,
            'dpD'=> $request->dpd,
            'pD'=> $request->pd,
            'nD'=> $request->nd,
            'dnD'=> $request->dnd,
            'neuD'=> $request->neud,
            'dpC'=> $request->dpc,
            'pC'=> $request->pc,
            'nC'=> $request->nc,
            'dnC'=> $request->dnc,
            'neuC'=> $request->neuc,
            'player_id'=> $request->player_id,
    
                 
                        
        ]);
        return redirect('/game/index/'.$request->player_id)->with('Mensaje', 'HEY, datos de juego creados satisfactoriamente!!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
        $game->delete();
        return redirect()->back()->with('Mensaje', 'HEY, Dato de juego eliminado satisfactoriamente!!!');
  
    }
}
