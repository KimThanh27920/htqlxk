<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Xe extends Model
{
    use SoftDeletes;// add soft delete
    protected $table='xe';
    protected $filable=['BienSo','LX_Ma','HangKiemDinh'];
    protected $primarykey='BienSo';
}
