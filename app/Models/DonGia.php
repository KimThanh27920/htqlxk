<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DonGia extends Model
{
    use SoftDeletes;// add soft delete
    //use HasFactory;
    protected $table ='don_gia';
    protected $fillable =['TD_Ma','Ngay','Giave'];
    protected $primarykey=['TD_Ma','Ngay'];

}
