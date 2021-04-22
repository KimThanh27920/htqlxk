<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TuyenDuong extends Model
{
    //use HasFactory;
    use SoftDeletes;// add soft delete
    protected $table = 'tuyen_duong';
    protected $fillable =[	
        'TD_Ma',
        'TD_XuatPhat',
        'TD_DichDen',
        'TD_DoDai',
        'TD_ThoiGian',
        'LX_Ma'
    ];
    protected $primarykey = 'TD_Ma';
}
