<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LichChay extends Model
{
//    use HasFactory;
    use SoftDeletes;// add soft delete  
    protected $table= 'lich_chay';
    protected $fillable =[
        'ID','NV_Ma','TD_Ma','Ngay','Gio','HoanThanh'	
    ];
    protected $primarykey = 'ID';
}