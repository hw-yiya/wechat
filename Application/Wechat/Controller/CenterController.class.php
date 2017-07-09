<?php
namespace Wechat\Controller;

use Think\Controller;

class CenterController extends Controller{
    public function index(){
        //已经登录
        if(is_login()){
            //跳转到我的
            $model = D('Member');
            $list = $model->where(['openid'=>session('openid')])->find();
            $this->assign('list',$list);
            $this->assign('img',session('img'));
            $this->display();
        }else{
            //未登录跳转到登录页
            redirect(U('Wechat/User/login'),2,'检测绑定状态!');
        }
    }
}