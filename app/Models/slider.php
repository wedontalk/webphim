<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    use HasFactory;
    protected $table = 'slide_phim';
    protected $fillable = ['id','id_phim','thu_tu','cap_nhat'];
    public $timestamps = false;

    public function showproduct(){
        return $this->hasOne(phim::class, 'id', 'id_phim');
    }
    public function showview(){
        return $this->hasMany(tapphim::class,'film_id', 'id_phim');
    }
    public function showslidechapter(){
        return $this->hasMany(tapphim::class, 'film_id', 'id_phim')->orderBy('id', 'desc');
    }
}
