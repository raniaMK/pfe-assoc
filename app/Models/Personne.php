<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;
    protected $table = 'personnes';

    protected $fillable = [
        'nom',
        'prenom',
        'CIN',
        'date_naiss',
        'tel',
        'adresse',
        'Situation_Fam',
        'nb_enfants'
    ];
    public function cheques()
    {
        return $this->hasMany(Cheque::class);

        //return $this->hasMany('App\Models\Coupon', 'id', 'personne_id');
    } 
    public function achats()
    {
        return $this->hasMany(Achat::class);

        //return $this->hasMany('App\Models\Coupon', 'id', 'personne_id');
    }
    public function scopeSelection($query)
    {
        return $query->select('id', 'prenom','CIN',
        'date_naiss',
        'tel',
        'adresse',
        'Situation_Fam',
        'nb_enfants');
    }
}
