<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class metaall extends Model
{
    use HasFactory;
    protected $table = 'meta_all';
    protected $filltable = ['id', 'tieu_de', 'meta_desc','meta_key','thuoc_tinh'];
    public $timestamps = false;


}
