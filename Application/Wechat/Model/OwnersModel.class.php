<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/10
 * Time: 22:16
 */

namespace Wechat\Model;


use Think\Model;

class OwnersModel extends Model
{
//    /* validate */
//    protected $_validate = [
//        ['name', 'require', '姓名不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH],
//        ['family_no', 'require', '房号不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_INSERT],
//        ['family_name', 'require', '小区名不能为空', self::MUST_VALIDATE , 'regex', self::MODEL_INSERT],
//        //['tel', '/^(0|86|17951)?(13[0-9]|15[012356789]|18[0-9]|14[57])[0-9]{8}$/', '联系电话不合法', self::MUST_VALIDATE , 'regex', self::MODEL_BOTH],
//        //['code', '/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/', '身份证号码不合法', self::MUST_VALIDATE , 'regex', self::MODEL_INSERT],
//
//    ];
//
    /* 自动完成规则 */
    protected $_auto = array(
        array('create_time', NOW_TIME, self::MODEL_INSERT),
        array('uid','setUid', self::MODEL_INSERT,'callback'),
    );
//
    public function setUid()
    {
        return  $_SESSION['onethink_home']['user_auth']['uid'];
    }
}