<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ve extends Model
{
   // use HasFactory;
   use SoftDeletes;// add soft delete
    protected $table ='ve';
    protected $fillable =['Ve_SoHieu','Ve_NgayLap','Ve_TenKH','Ve_Sdt' ];
    protected $primarykey='Ve_SoHieu';
}
