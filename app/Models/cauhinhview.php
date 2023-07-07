<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cauhinhview extends Model
{
    use HasFactory;
    protected $table = 'cauhinh_view';
    protected $fillable = ['id','logo_header','logo_footer','thongtin'];
    public $timestamps = false;
}
