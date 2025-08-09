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



    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
}
