<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crawllink extends Model
{
    use HasFactory;
    protected $table = 'crawlphim';
    protected $fillable = ['id','id_phim','link_tapphim','action'];
    public $timestamps = false;

    public function linkphim(){
        return $this->hasOne(phim::class, 'id', 'id_phim');
    }
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('id','like',$key);
        }
        return $query;
    }
    
}
