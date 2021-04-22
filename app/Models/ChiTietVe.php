<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChiTietVe extends Model
{
    use SoftDeletes;// add soft delete
    protected $table ='chi_tiet_ve';
    protected $fillable =['Ve_SoHieu', 'TD_Ma','Gio','Ngay','SoGhe'];
    protected $primarykey='Ve_SoHieu';
   
}
