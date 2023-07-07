<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class batauto extends Model
{
    use HasFactory;
    protected $table = 'bat_auto';
    protected $fillable = ['id','id_auto'];
    public $timestamps = false;
}
