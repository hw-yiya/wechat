<?php
namespace Wechat\Controller;

use Think\Controller;

class CenterController extends Controller{
    public function index(){
        //已经登录
        if(is_login()){
            //跳转到我的
            $uid = $_SESSION['onethink_home']['user_auth']['uid'];
//            dump($_SESSION['onethink_home']);exit;
            if($uid){
//                echo 'dshfgj';
                $model = M('member');
//                dump($model);exit;
                $member = $model->where(['uid'=>$uid])->find();
//                dump($member);exit;
                $this->assign('member',$member);
                $this->display('index');
            }
        }else{
            //未登录跳转到登录页
            redirect('error');
        }
    }
}