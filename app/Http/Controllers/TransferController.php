<?php

namespace App\Http\Controllers;

use App\Models\Transfer;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;

class TransferController extends Controller
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
        return view('transfer.index', compact('players'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $transfer = Transfer::select('transfers.id','team_back','teams.name_team','team_next','status','price','transfers.created_at')
        ->join('players','transfers.player_id','=','players.id')
        ->join('teams','transfers.team_next','=','teams.id')
        ->where('player_id',$id)->get();

       
                   
        $teams = Team::all();
        $players = Player::findOrFail($id);
        return view('transfer.create', compact('players','teams','transfer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Transfer::create([

            'team_back'=> $request->Team, 
            'team_next'=> $request->Team2, 
            'price'=> $request->Price,
            'status'=> 'Para Revision',
            'player_id'=> $request->player_id,
    
                 
                        
        ]);
        return redirect('/transfer/create/'.$request->player_id)->with('Mensaje', 'HEY, transferencia creada satisfactoriamente!!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function show(Transfer $transfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function edit(Transfer $transfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transfer $transfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transfer $transfer)
    {
        //
    }
    public function transferPDF($id)
    {
       
       
        

       $transfers = Transfer::findOrFail($id);
       
       $players=Player::findOrFail($transfers->player_id);

     $tra=Team::findOrFail($transfers->team_next);
       $transfer=$tra->name_team;
       
       
        $pdf = PDF::loadView('transfer.transferPDF',['transfers'=>$transfers,'players'=>$players,'transfer'=>$transfer]);
        
        return $pdf->stream('transfer.transferPDF',array('Attachment'=>false));
       
    }
}
