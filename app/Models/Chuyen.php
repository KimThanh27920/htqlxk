<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chuyen extends Model
{
  //  use HasFactory;
  use SoftDeletes;// add soft delete

    protected $table = 'chuyen';
    protected $fillable =['TD_Ma','Gio'];
    protected $primarykey = ['TD_Ma','Gio'];
}
