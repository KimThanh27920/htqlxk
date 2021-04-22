<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaiXe extends Model
{
    protected $table='tai_xe';
    protected $fillable=['NV_Ma','SoHieuBangLai'];
    protected $primarykey='NV_Ma';
}
