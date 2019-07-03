<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Useraddress extends Model
{
    //与模型关联的数据表
    protected $table = 'address';
    //主键
    protected $primaryKey="id";
    //是否开启自动维护事件戳 false 不开启 true开启
    public $timestamps = false;
}
