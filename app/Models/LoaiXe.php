<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class LoaiXe extends Model
{
    use SoftDeletes;// add soft delete
    protected $table='loai_xe';
    protected $fillable =['LX_Ma','LX_Ten'];
    protected $primarykey='LX_Ma';
}
