<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trangthai extends Model
{
    use HasFactory;
    protected $table="trang_thai";
    protected $fillable = ['id','name','slug'];
    public $timestamps = false;
}
