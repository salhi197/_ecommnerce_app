<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        'nom',
        'catégorie',
        'quantite',
        'prix_achat',   
        'prix_vente',   
        'description'    
    ];

}


