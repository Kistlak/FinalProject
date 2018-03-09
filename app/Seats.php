<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seats extends Model
{
    
    public $timestamps = false;
    protected $table = "seats";
    protected $primarykey = "id";
    protected $casts = ["id" => "INT"];

    protected $fillable = ['date','st','item'];
    
}


