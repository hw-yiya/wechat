<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/10
 * Time: 22:37
 */

namespace Wechat\Controller;


use Think\Controller;

class OwnersController extends Controller
{
    public function register(){
        if(is_login()){
            //判断用户是否已经提交了认证信息
            $uid = $_SESSION['onethink_home']['user_auth']['uid'];
            $owner = M('owners')->where(['uid'=>$uid])->find();
            if($owner){
                //表示该用户已经提交了认证信息
                //判断该认证的状态;
                switch ($owner['status']){
                    case 0:
                        //表示状态为待审核
                        $this->error('你的认证处于待审核阶段',U('Service/listIndex'));
                        break;
                    case 1:
                        //表示已通过审核
                        $this->error('你的认证已通过',U('Service/listIndex'));
                        break;
                    default:
                        //表示审核不通过
                        $this->error('你的认证已被拒绝,请尽快联系物业',U('Service/listIndex'));
                        break;
                }
            }else{
                if(IS_POST) {
                    //dump($_POST);exit;
                    $repair = D('owners');
                    $data = $repair->create();
                    if ($data) {
                        $id = $repair->add();
                        if ($id) {
                            $this->success('认证已提交等待审核', U('Service/listIndex'));
                            //记录行为
                            action_log('update_sale', 'sale', $id, UID);
                        } else {
                            $this->error('认证失败请重新填写');
                        }
                    } else {
                        $this->error($repair->getError());
                    }
                }
                $this->display();
            }



        }else{
            $this->display('Center/error');
        }
    }
}