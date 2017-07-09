<?php
namespace Admin\Model;

use Think\Model;

class FamilyModel extends Model{
    protected $_validate = array(
        array('title', 'require', '标识不能为空', self::EXISTS_VALIDATE),
        array('price', 'require', '价钱不能为空', self::MUST_VALIDATE ),
        array('img', 'require', '图片不能为空'),
        array('phone', 'require', '联系电话不能为空', self::MUST_VALIDATE ),
    );
    protected $_auto = array(
        array('create_time', NOW_TIME, self::MODEL_INSERT),
        array('name', 'admin', self::MODEL_INSERT),
        array('status', '1', self::MODEL_INSERT),
    );
    public function Edit($id){
        $one=$this->where('id='.$id)->find();
        return $one;
    }
}