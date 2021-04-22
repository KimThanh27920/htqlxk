<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HeSo extends Model
{
    use SoftDeletes;// add soft delete
    protected $table ='he_so_luong';
    protected $fillable =['VTCT_Ma','Ngay','HeSoLuong'];
    protected $primarykey=['VTCT_Ma','Ngay'];
}
