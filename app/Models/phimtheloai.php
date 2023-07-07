<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phimtheloai extends Model
{
    use HasFactory;
    protected $table = 'phim_theotheloai';
    protected $fillable = ['id','id_theloai','id_phim'];
    protected $primaryKey = 'id';
    public $timestamps = false;

}
