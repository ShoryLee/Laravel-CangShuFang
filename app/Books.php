<?php
/**
 * Created by PhpStorm.
 * User: shory
 * Date: 2016-12-10
 * Time: 21:57
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    //定义书籍状态的常量
    const IN_STORE = 1;//在库
    const GIVED = 2;   //送出
    const BORROWED = 3;//借出
    const LOSTED = 4; //丢失
    const DAMAGED = 5;//损坏
    const UNKNOWN = 6;//未知

    //指定表
    protected $table = 'book';

    //指定主键
    protected $primaryKey = 'id';

    //设置时间戳
    public $timestamps = true;

    //返回时间
    protected function getDateFormat()
    {
        return time();
    }

    public function mark($ind = null)
    {
        $marks = [
            self::IN_STORE => '在库',
            self::GIVED => '送出',
            self::BORROWED => '借出',
            self::LOSTED => '丢失',
            self::DAMAGED => '损坏',
            self::UNKNOWN => '未知',
        ];

        if($ind !== null) {
            return array_key_exists($ind, $marks) ? $marks[$ind] : $marks[self::UNKNOWN];
        }
        return $marks;
    }
}