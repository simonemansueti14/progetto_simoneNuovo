<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prenotazione extends Model
{
    use HasFactory;

    protected $table = 'prenotazioni';

    protected $fillable = ['giorno','orario','posti','nome','note','user_id'];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
