<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VTCT extends Model
{
    use SoftDeletes;// add soft delete
    protected $table='vi_tri_cong_tac';
    protected $fillable=['VTCT_Ma','VTCT_Ten'];
    protected $primarykey='VTCT_Ma';
}
