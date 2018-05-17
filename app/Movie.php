<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function shows()
    {
        return $this->hasMany(Show::class);
    }
}
