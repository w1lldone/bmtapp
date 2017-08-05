<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $dates = ['tanggal'];
    protected $guarded = ['id'];
}
