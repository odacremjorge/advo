<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $fillable = [
        'num_reg',
        'kardex',
        'name_player',
        'nacionality', 
        'date_birth', 
        'ci_player',
        'category_player',
        'date_hab',
        'picture_player',
        'condition_player',
        'gender_player',
        'city_player',
        'address_player',
        'phone_player',
        'orc_player',
        'ln_player',
        'partida_player',
        'work_player',
        'studies_player',
        'degree_player',
        'team_ant',
        'team_id',
     ];
}
