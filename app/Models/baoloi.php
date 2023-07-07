<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class baoloi extends Model
{
    use HasFactory;
    protected $table = 'trangthai_baoloi';
    protected $dates = [
        'updated_at','created_at',
      ];
    protected $fillable = ['id','id_episode','id_server','id_film','description','cap_nhat','updated_at','created_at'];
    
    public function idepisodeandserver(){
        return $this->hasOne(tapphim::class,'id','id_episode');
    }
    public function idfilm(){
        return $this->hasOne(phim::class,'id','id_film');
    }
}
