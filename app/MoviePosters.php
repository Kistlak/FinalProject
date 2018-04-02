<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoviePosters extends Model
{

    public $timestamps = false;
    protected $table = "movieposters";
    protected $primarykey = "id";
    protected $casts = ["id" => "INT"];

    protected $fillable = ['mname', 'fshow', 'sshow', 'fileimg', 'filemove'];

}


