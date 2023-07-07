<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thongbao extends Model
{
    use HasFactory;
    protected $table = 'thong_bao';
    protected $dates = [
        'thoigian_capnhat'
      ];
    protected $fillable = ['id','text_thongbao','trang_thai','thoigian_capnhat'];
    public $timestamps = false;

}
