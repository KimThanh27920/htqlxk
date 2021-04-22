<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NhanVien extends Model
{
    //use HasFactory;
    use SoftDeletes;// add soft delete

    // const     CREATED_AT    = 'ctdh_taoMoi';
    // const     UPDATED_AT    = 'ctdh_capNhat';
    // protected $dates        = ['ctdh_taoMoi', 'ctdh_capNhat','delete_at'];

    protected $table = 'nhan_vien';
    protected $fillable =[	
        'NV_Ma',
        'DD_Ma',
        'VTCT_Ma',
        'NV_HoTen',
        'NV_NgaySinh',
        'NV_GioiTinh',
        'NV_DiaChi',
        'NV_Sdt'  ];
    protected $primarykey = 'NV_Ma';
}
