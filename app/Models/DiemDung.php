<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DiemDung extends Model
{
    use SoftDeletes;// add soft delete
    protected $table='diem_dung';
    protected $fillable=['DD_Ma','DD_Ten'];
    protected $primarykey='DD_Ma';
}
