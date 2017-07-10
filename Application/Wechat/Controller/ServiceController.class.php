<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/8
 * Time: 20:22
 */

namespace Wechat\Controller;


use Think\Controller;

class ServiceController extends Controller
{
    public function listIndex()
    {
        $this->display('index');
    }

    public function index()
    {
        $doc = M('document');
        $pic = M('picture');
        //$list = $doc->select();
        $list = $doc->join('as document left join picture on document.cover_id = picture.id')->field('document.*,picture.path')->where(['category_id'=>42])->select();
        //dump($list);exit;
        $this->assign('list',$list);
        $this->display('bianming');
    }
}