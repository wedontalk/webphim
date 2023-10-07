<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $table = 'comment_episode';
    protected $dates = [
        'ngaycapnhat'
    ];
    protected $fillable = [
        'id','id_phim','id_user','parent_id','content','reply_id','id_episode'
    ];
    public $timestamps = false;



    public function idUser(){
        return $this->hasOne(User::class, 'id', 'id_user');
    }
    public function idEpisode(){
        return $this->hasOne(tapphim::class, 'id', 'id_episode');
    }

    public function idPhim(){
        return $this->hasOne(phim::class, 'id', 'id_phim');
    }

    public function reply_id_user(){
        return $this->hasOne(User::class,'id', 'reply_id');
    }

    public function replies(){
        return $this->hasMany('App\Models\comment', 'parent_id');
    }
}
