<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class autocrawl extends Model
{
    use HasFactory;
    protected $table = 'autocrawl';
    protected $fillable = ['id','film_id','thu_tu','cap_nhat'];
    public $timestamps = false;

    public function autofilm(){
        return $this->hasMany(phim::class, 'id', 'film_id');
    }
    public function autofilmone(){
        return $this->hasOne(phim::class, 'id', 'film_id');
    }
}
