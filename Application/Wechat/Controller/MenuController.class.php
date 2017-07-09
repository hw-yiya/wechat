<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/9
 * Time: 11:34
 */

namespace Wechat\Controller;


class MenuController extends WechatController
{
    public function create(){
        $menu = $this->app->menu;
        $buttons = [
            [
                "type" => "view",
                "name" => "物业管理",
                "url"  => "http://www.onethink-master.com/index.php?s=/Wechat/index/index.html"
            ]
        ];
        if($menu->add($buttons)!==false){
            $this->success("添加成功");
        }

    }

    public function getmenu(){
        $menu = $this->app->menu;
        $menus = $menu->all();
        dump($menus);
    }

}