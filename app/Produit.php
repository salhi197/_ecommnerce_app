<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        'nom',
        'catégorie',
        'quantite',
        'prix' ,   
        'budget',
        'description'    
    ];

}
