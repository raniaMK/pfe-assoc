<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class Marchand  extends Authenticatable  implements JWTSubject
{
    use HasFactory;
    protected $table = 'marchands';

    protected $fillable = [
        'nom_marchand',
        'prenom_marchand',
        'CIN',
        'tel',
        'login',
        'password',
        'adresse_marchand'
    ];
    protected $hidden = [
        'password',
    ];
    public function achats()
    {
        return $this->hasMany(Achat::class);

        //return $this->hasMany('App\Models\Coupon', 'id', 'personne_id');
    }

    public function reclamation()
    {
        return $this->hasMany(Reclamation::class);

        //return $this->hasMany('App\Models\Coupon', 'id', 'personne_id');
    } 
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
