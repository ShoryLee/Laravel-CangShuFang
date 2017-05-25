<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //设置数据表
    protected $table = 'ratings';

    //指定主键
    protected $primaryKey = 'id';

    //设置时间戳
    public $timestamps = true;

    //返回时间
    protected function getDateFormat()
    {
        return time();
    }


}