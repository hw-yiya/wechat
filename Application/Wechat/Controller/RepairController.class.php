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

        if (is_login()) {
            $this->display();
        } else {
            $this->display('Center/error');
        }
    }

}