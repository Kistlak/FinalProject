<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    public $timestamps = false;
    protected $table = "contactus";
    protected $primarykey = "id";
    protected $casts = ["id" => "INT"];

    protected $fillable = ['name', 'email', 'num', 'msg'];
}
