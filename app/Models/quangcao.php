<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quangcao extends Model
{
    use HasFactory;
    protected $table = 'quang_cao';
    protected $fillable = ['id','images','link','id_trang','id_hienthi','id_trangthai'];
    protected $primaryKey = 'id';
    public $timestamps = false;
}
