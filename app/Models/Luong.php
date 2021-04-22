<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Luong extends Model
{
    use SoftDeletes;// add soft delete
    protected $table ='don_gia_luong';
    protected $fillable =['VTCT_Ma','Ngay','DonGiaLuong'];
    protected $primarykey=['VTCT_Ma','Ngay'];
}
