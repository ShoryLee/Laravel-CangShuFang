<?php
/**
 * Created by PhpStorm.
 * User: shory
 * Date: 2016-12-10
 * Time: 22:34
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //设置数据表
    protected $table = 'comments';
    //设置ID
    protected $primaryKey = 'id';
    //设置时间
    public $timestamps = true;
    //设置时间戳
    protected function getDateFormat()
    {
        return time();
    }

}