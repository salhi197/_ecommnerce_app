<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table="typelivraison";
    
    protected $fillable = [
        'label','temps','prix','commission'
    ];
}
