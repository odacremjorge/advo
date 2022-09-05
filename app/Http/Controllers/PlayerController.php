<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Carbon\Carbon;
use PDF;



class PlayerController extends Controller
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

        
        return view('player.index', compact('players'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $teams = Team::all();
        return view('player.create', compact('teams'));
        
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
        $path_img = 'player_pic';

        $this->validate($request, [
            'Foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $file = $request->file('Foto');
        $file_name = time() . '.png';
        try {
            Storage::disk('public')->put($path_img . '/' . $file_name, File::get($file));
        } catch (\Exception $exception) {
            return response('error', 400);
        }
        //
        */
        $path_img = 'player_pic';
        $file = $request->file('Foto');
        //obtenemos el nombre del archivo
        $nombre =  time()."_".$file->getClientOriginalName();
        //indicamos que queremos guardar un nuevo archivo en el disco local
        Storage::disk('public')->put($path_img . '/' .$nombre,  File::get($file));
        
        //
        Player::create([
            'num_reg' => $request->Registro,
            'kardex' => $request->Kardex,
            'name_player' => $request->Name,
            'nacionality' => $request->Nacionalidad,
            'date_birth' => $request->Date,
            'ci_player' => $request->Ci,
            'category_player' => $request->Category,
            'picture_player' => $nombre,
            'condition_player' => 'Nuevo',
            'team_id' => $request->Team,
            'gender_player' => $request->Gender,
            'city_player' => $request->Lugar,
            'address_player' => $request->Direccion,
            'phone_player' => $request->Telefono,
            'orc_player' => $request->ORC,
            'ln_player' => $request->LN,
            'partida_player' => $request->Partida,
            'work_player' => $request->Trabajo,
            'studies_player' => $request->Estudios,
            'degree_player' => $request->Grado,
            'team_ant' => $request->Anterior,

        ]);
        return redirect('/player')->with('Mensaje', 'HEY, Jugador creado satisfactoriamente!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $teams = Team::all();
        $player = Player::findOrFail($id);
        return view('player.edit', ['player' => $player, 'teams' => $teams]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //guarda archivo

        $path_img = 'player_pic';
        $file = $request->file('Foto');
        //obtenemos el nombre del archivo
        $nombre =  time()."_".$file->getClientOriginalName();
        //indicamos que queremos guardar un nuevo archivo en el disco local
        Storage::disk('public')->put($path_img . '/' .$nombre,  File::get($file));
             
        //
        $player = Player::findOrFail($id);
        $player->num_reg = $request->Registro;
        $player->kardex = $request->Kardex;
        $player->name_player = $request->Name;
        $player->nacionality = $request->Nacionalidad;
        $player->date_birth = $request->Date;
        $player->ci_player = $request->Ci;
        $player->category_player = $request->Category;
        $player->picture_player = $nombre;
        $player->team_id = $request->Team;
        $player->gender_player = $request->Gender;
        $player->city_player = $request->Lugar;
        $player->address_player = $request->Direccion;
        $player->phone_player = $request->Telefono;
        $player->orc_player = $request->ORC;
        $player->ln_player = $request->LN;
        $player->partida_player = $request->Partida;
        $player->work_player = $request->Trabajo;
        $player->studies_player = $request->Estudios;
        $player->degree_player = $request->Grado;
        $player->team_ant = $request->Anterior;
        $player->save();
        return redirect('/player')->with('Mensaje', 'HEY, Jugador actualizado satisfactoriamente!!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        //
        $player->delete();
        return redirect()->back()->with('Mensaje', 'HEY, Jugador eliminado satisfactoriamente!!!');
    }
    public function card($id)
    {
        //
        $play=Player::select('players.id','teams.name_team','name_player','date_birth','ci_player', 'category_player','picture_player','condition_player','nacionality','date_hab')
        ->join('teams','players.team_id','=','teams.id')
        ->where('players.id',$id)
        ->first();
        
       
        return view('player.card', ['play' => $play]);
    }

    public function enable($id)
    {
        
        date_default_timezone_set("America/La_Paz");
        $date = Carbon::now('-04');
    
        //
        $player = Player::findOrFail($id);
        $player->condition_player = 'Antiguo';
        $player->date_hab = $date;
        $player->save();
        return redirect('/player')->with('Mensaje', 'HEY, Jugador habilitado satisfactoriamente!!!');

    }
    public function playerPDF($id)
    {
       
        $players=Player::select('players.id','teams.name_team','name_player','date_birth','ci_player', 'category_player','picture_player','condition_player','nacionality','date_hab', 'num_reg', 'gender_player', 'city_player', 'address_player', 'phone_player', 'orc_player', 'ln_player', 'partida_player', 'work_player', 'studies_player', 'degree_player', 'team_ant')
        ->join('teams','players.team_id','=','teams.id')
        ->where('players.id',$id)
        ->first();

        $date = Carbon::createFromDate($players->date_birth)->age;
       
        $pdf = PDF::loadView('player.playerPDF',['players'=>$players, 'date'=>$date]);
        
        return $pdf->stream('player.playerPDF',array('Attachment'=>false));
       
    }
    public function approveTransfer($id)
    {
        
       
        //
        $transfer = Transfer::findOrFail($id);
        $player = Player::findOrFail($transfer->player_id);
        
        $player->team_id = $transfer->team_next;
        
        $player->save();

        $transfer->status = 'Transferido';
        
        $transfer->save();
        return redirect('/player')->with('Mensaje', 'HEY, Jugador transferido satisfactoriamente!!!');

    }

}
