<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id','id_film','rating'
    ];
    protected $table = 'tbl_rating';
}
