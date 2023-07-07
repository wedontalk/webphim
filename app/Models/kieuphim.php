<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kieuphim extends Model
{
    use HasFactory;
    protected $table = 'type-movie';

    //protected $filltable = ['name', 'status', 'prioty'];

    public function products()
    {
       return $this->hasMany(phim::class,'type_movie','id');
    }
    //localscope
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
}
