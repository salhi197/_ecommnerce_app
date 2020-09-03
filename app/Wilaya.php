<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilaya extends Model
{
    protected $table = 'wilayas';

    public function communes()
    {
        return $this->hasMany(Commune::class, 'wilaya', 'id');
    }
}
