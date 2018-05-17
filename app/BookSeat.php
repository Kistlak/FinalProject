<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookSeat extends Model
{
    public $timestamps = false;
    protected $table = "book";
    protected $primarykey = "id";
    protected $casts = ["id" => "INT"];

    protected $fillable = ['sdate', 'stime', 'seatno'];
}
