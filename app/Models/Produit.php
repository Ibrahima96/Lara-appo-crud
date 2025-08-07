<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = ['nom', 'prix', 'stock', 'description'];


   public function commandes()
{
    return $this->belongsToMany(Commande::class, 'commande_produit')->withPivot('quantite')->withTimestamps();
}


}
