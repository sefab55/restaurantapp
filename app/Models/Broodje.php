<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Broodje extends Model
{
    use HasFactory;

    protected $table = 'broodjes'; 

    protected $fillable = [
        'broodjesnaam',
        'broodjespng',
        'prijs',
    ];
    
}