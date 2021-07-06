<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{protected $fillable = [
    'sujet',
    'message',
    'marchand_id'
];
public function marchand()
{
    //return $this->belongsTo(Personne::class,'foreign_key');
    return $this->belongsTo(Marchand::class);

    //return $this->belongsTo('App\Personne','personne_id','id');
}
}
