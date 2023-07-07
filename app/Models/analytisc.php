<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class analytisc extends Model
{
    use HasFactory;
    protected $table = 'analytisc_google';
    protected $fillable = ['id','content'];
    public $timestamps = false;
}
