<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{

    public function livreur()
    {
        return $this->belongsTo('App\Livreur');
    }
    
    public function produits()
    {
        return $this->hasMany('App\Produit');
    }
    
    protected $fillable = [
        'produit',
        'quantite',
        'prix',
        'prix_livraison',
        'command_express',
        'nom_client',
        'telephone',
        'adress',
        'wilaya',
        'commune',
        'note',
        'state',
        'livreur','
        remise'      
    ];
}
