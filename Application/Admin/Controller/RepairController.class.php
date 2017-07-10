<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/10
 * Time: 10:39
 */

namespace Admin\Controller;


class RepairController extends AdminController
{
    public function index(){
        $repair = M('Repair'); // 实例化User对象
        $count      = $repair->count();// 查询满足要求的总记录数
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $repair = $repair->order('create_time')->limit()->select();
        $this->assign('repair',$repair);// 赋值数据集
//        dump($repair);exit;
        $this->display(); // 输出模板
    }

}