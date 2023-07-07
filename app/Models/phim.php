<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phim extends Model
{
    use HasFactory;
    protected $table = 'film';
    protected $dates = [
      'ngaycapnhat','updated_at','created_at'
    ];
    protected $fillable = ['id','name','image','name2','year','slug','trailer','id_theloai','type_movie','description','phim_noibat','duration','status','anHien','meta_desc','meta_keyword','ngaycapnhat'];
    public function cat()
    {
      return $this->hasOne(danhmuc::class, 'id', 'id_theloai');
    }
    public function kieuphim()
    {
      return $this->hasOne(kieuphim::class, 'id', 'type_movie');
    }
    public function showphimfirst(){
      return $this->hasMany(tapphim::class, 'film_id', 'id');
    }
    public function showphimhasOne(){
      return $this->hasOne(tapphim::class, 'film_id', 'id');
    }
    public function tapphim()
    {
      return $this->hasMany(tapphim::class, 'film_id', 'id');
    }
    public function tapphimchitiet()
    {
      return $this->hasOne(tapphim::class, 'film_id', 'id')->orderBy('id', 'desc');
    }
    public function showtapphimserver()
    {
      return $this->hasOne(tapphim::class, 'film_id', 'id');
    }
    public function ratingne()
    {
      return $this->hasMany(rating::class, 'id_film', 'id');
    }
    public function phimle(){
      return $this->belongsTo('App\Models\phimle');
    }
    public function nhieutheloai(){
      return $this->belongsToMany(danhmuc::class,'phim_theotheloai','id_phim','id_theloai');
    }
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
}
