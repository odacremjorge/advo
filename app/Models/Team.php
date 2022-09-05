<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_team',
        'personality',
        'date_creation',
        'category_max', 
        'logo', 
        'manager',
        'phone_manager',
        'entrenador_id',
        'user_id',
     ];
}
