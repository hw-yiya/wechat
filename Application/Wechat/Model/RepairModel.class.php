<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/10
 * Time: 21:53
 */

namespace Wechat\Model;


use Think\Model;

class RepairModel extends Model
{
    /* validate */
    protected $_validate = [
        ['title', 'require', '标题不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH],
        ['name', 'require', '姓名不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH],
        ['address', 'require', '地址不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_INSERT],
        ['tel', 'require', '联系电话不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH],
    ];

    /* 自动完成规则 */
    protected $_auto = array(
        array('create_time', NOW_TIME, self::MODEL_INSERT),
        array('order','setOrderNo',self::MODEL_INSERT,'callback')
    );

    public function setOrderNO()
    {
        return date('YmdHis').rand(100000, 999999);
    }
}