<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userss extends Model
{
    //与模型关联的数据表
    protected $table = 'userss';
    //主键
    protected $primaryKey="id";
    //是否开启自动维护时间戳 false 不开启 true 开启
    public $timestamps = true;
    //可以批量赋值的属性
    protected $fillable = ['username','password','status','token','email','phone','created_at','update_at'];
    //修改器 对数据做自动处理 status 字段名
    public function getStatusAttribute($value){
    	$status=[0=>"禁用",1=>"开启"];
    	return $status[$value];
    }

    //关联info的信息(一对一)
    public function info(){
    	return $this->hasOne('App\Models\Userinfo','users_id');
    }

    //关联address表的信息  一对多
    public function address(){
    	return $this->hasMany('App\Models\Useraddress','user_id');
    }
}
