<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_race', 
        'year_race',
        'position_race',
        'type_race', 
        'team_race', 
        'player_id',
     ];
}
