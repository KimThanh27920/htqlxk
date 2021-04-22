<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Gio extends Model
{
    use SoftDeletes;// add soft delete
    
    protected $table='gio_xuat_ben';
    protected $primarykey='Gio';
}
