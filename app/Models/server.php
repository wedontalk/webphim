<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class server extends Model
{
    use HasFactory;
    protected $table = 'server_episode';
    protected $fillable = ['id','name_server','action'];
    public $timestamps = false;

    public function serverlink(){
        return $this->hasMany(tapphim::class, 'id_server', 'id');
    }
    // public function nhieuserver(){
    //     return $this->belongsToMany(tapphim::class);
    // }
}
