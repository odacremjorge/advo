<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class record extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_type',
        'gender',
        'year',
        'position', 
        'type_championship', 
        'team_dep', 
        'entrenador_id',
     ];
}
