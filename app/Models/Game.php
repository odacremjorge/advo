<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = [
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
            'neuC',
            'player_id',
     ];
}
