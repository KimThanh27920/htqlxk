<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ngay extends Model
{
    use SoftDeletes;// add soft delete
    protected $table='thoi_diem';
    protected $primarykey='Ngay';
}
