<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Birra extends Model
{
    use HasFactory;

    protected $table = 'birre'; // 👈 AGGIUNGI QUESTA RIGA
}
