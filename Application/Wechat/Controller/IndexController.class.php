<?php
namespace Wechat\Controller;

use Think\Controller;

class IndexController extends Controller{
    /* 用户中心首页 */
    public function index(){
//        $this->buildHtml("index",'',"");
        //这个是方法里面

        $this->display();
    }
}