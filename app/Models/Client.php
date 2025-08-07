<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'nom',
        'email',
        'telephone'
    ];



    public function commande(){
        return $this->hasMany(Commande::class); //📢 Traduction : « Un client a plusieurs commandes »
    }
}
