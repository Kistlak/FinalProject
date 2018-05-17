<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoviePosters extends Model
{
    public $timestamps = false;
    protected $table = "movies";
    protected $primarykey = "id";
    protected $casts = ["id" => "INT"];

    protected $fillable = ['title', 'fshow', 'sshow', 'fileimg', 'filemove'];
}
