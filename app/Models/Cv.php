<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;
    protected $fillable = [
        'height_player',
        'position_usual',
        'scope1',
        'scope2',
        'player_id',
     ];
}
