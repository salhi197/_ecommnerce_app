<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $table = 'communes';

    public function wilaya()
    {
        return $this->belongsTo(Wilaya::class);
    }
}
