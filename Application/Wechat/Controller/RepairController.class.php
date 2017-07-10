<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/8
 * Time: 20:33
 */

namespace Wechat\Controller;


use Think\Controller;

class RepairController extends Controller
{
    public function Index()
    {
            //判断用户是否登录
            if(is_login()){
                if(IS_POST) {
                    //dump($_POST);exit;
                    $repair = D('repair');
                    $data = $repair->create();
                    if ($data) {
                        $id = $repair->add();
                        if ($id) {
                            $this->success('报修成功', U('index'));
                            //记录行为
                            action_log('update_sale', 'sale', $id, UID);
                        } else {
                            $this->error('报修失败');
                        }
                    } else {
                        $this->error($repair->getError());
                    }
                }

                $this->display();

            }else {
                $this->display('Center/error');
            }
    }
}