<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/7
 * Time: 17:07
 */

namespace Wechat\Controller;


use Think\Controller;

class FamilyController extends Controller
{
    public function index()
    {
//        $this->buildHtml("index",'',"");
        $chuz = M('Family')->where(['type'=>1])->select();
        $shou = M('Family')->where(['type'=>2])->select();
        $this->assign('chuz',$chuz);
        $this->assign('shou',$shou);
        $this->display('index');
    }

    public function detail()
    {
        $id = I('get.id',1);
        $model = M('Family');
        $list = $model->where(['id'=>$id])->find();

        $this->assign('list',$list);
        $this->display();

    }
}