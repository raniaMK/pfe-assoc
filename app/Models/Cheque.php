<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero',
        'montant',
        'validité',
        'personne_id'
    ];
    public function personne()
    {
        //return $this->belongsTo(Personne::class,'foreign_key');
        return $this->belongsTo(Personne::class);

        //return $this->belongsTo('App\Personne','personne_id','id');
    }
}
