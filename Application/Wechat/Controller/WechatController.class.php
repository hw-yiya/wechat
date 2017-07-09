<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/9
 * Time: 11:33
 */

namespace Wechat\Controller;

use Think\Controller;

class WechatController extends Controller
{
    protected $app;
    /**
     * 该方法被构造函数调用.
     */
    public function _initialize(){
        //>>1.加载easywechat的类库
        vendor("autoload");
        //>>2.创建application对象
        $options = C("WX_CONFIG");//读取config.php中的微信相关的配置信息
        //>>3.初始化成功变量的值.
        $this->app = new Application($options);
    }


}