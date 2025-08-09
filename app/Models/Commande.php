<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = ['client_id', 'total', 'date_commande'];

    /**
     * Relation : Une commande appartient à un client.
     * Cela signifie que chaque commande est liée à un seul client.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Relation : Une commande peut contenir plusieurs produits (relation plusieurs à plusieurs).
     * La table pivot 'commande_produit' permet de stocker la quantité de chaque produit dans la commande.
     * withPivot('quantite') permet d'accéder à la quantité commandée pour chaque produit.
     * withTimestamps() ajoute les colonnes created_at et updated_at sur la table pivot.
     */
    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'commande_produit')
                    ->withPivot('quantite')
                    ->withTimestamps();
    }
}
