<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tapphim extends Model
{
    use HasFactory;
    protected $table="episode";
    protected $dates = [
      'updated_at','created_at',
    ];
    protected $fillable = ['film_id', 'episode','episode_name','content','slug_phim','id_server','view_episode','anHien'];

    public function products()
    {
       return $this->hasOne(phim::class,'id','film_id');
    }
    public function phimtheotap()
    {
       return $this->hasMany(phim::class,'id','film_id');
    }
    public function phim(){
      return $this->belongsTo('App\Models\phim');
    }
    public function loaiphim(){
        return $this->belongsTo('App\Models\danhmuc');
    }
    public function funcserver(){
      return $this->hasOne(server::class,'id','id_server');
    }
    // public function idphim()
    // {
    //   return $this->hasOne(phim::class, 'film_id', 'id');
    // }
    public function serverlink(){
      return $this->hasMany(server::class, 'id_server', 'id');
    }
    public function nhieuserver(){
      return $this->belongsTo('App\Models\server');
    }

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('slug_phim','like','%'.$key.'%');
        }
        return $query;
    }
}
