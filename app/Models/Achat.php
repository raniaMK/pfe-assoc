<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;
    protected $fillable = [
        'montant',
        'cheque_id',
        'marchand_id'
      
    ];
    
    public function achat()
    {
        //return $this->belongsTo(Personne::class,'foreign_key');
      //  return $this->belongsTo(Personne::class,Marchand::class);

        //return $this->belongsTo('App\Personne','personne_id','id');
        //return $this->belongsToMany('Users', 'store_member', 'store_id', 'user_id');

    }
    public function cheques(){
        return $this->belongsToMany('Cheque');
    }
    public function marchands(){ // <- here
        return $this->belongsTo('Marchand');
    } 
    
   
}
