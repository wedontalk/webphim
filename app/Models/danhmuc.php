<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = ['id','name','slug','anHien','meta_desc','meta_keyword'];

    public function products()
    {
       return $this->hasMany(phim::class,'id_theloai','id');
    }
    //localscope

    public function phimtheotheloai(){
        return $this->hasOne(phimtheloai::class, 'id_theloai', 'id');
    }

    public function phim(){
        return $this->belongsTo(phim::class);
    }
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
}
