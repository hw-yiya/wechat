<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/8
 * Time: 20:10
 */

namespace Wechat\Controller;


use Think\Controller;
use Think\Page;

class ActivityController extends Controller
{
    public function index($p=1)
    {
        $data = [];
        $pagesize = 1;
        if(IS_AJAX){
            $model = M('document')->where('category_id=41 AND status=1')->limit(($p-1)*$pagesize,$pagesize)->select();

            $page = I('get.p');
            $article = M('document')->select();
            foreach ($model as $no){
                foreach ($article as $ar){
                    if($no['id'] == $ar['id']){
                        $no['create_time'] = date('Y-m-d',$no['create_time']);
                        $no['deadline'] = date('Y-m-d',$no['deadline']);
                        $path =  M('picture')->where(['id'=>$no['cover_id']])->find();
                        $no['path'] =$path['path'];
                        $no['content'] = $ar['content'];
                        $data[] = $no;
                    }
                }
            }
            if($data){

                $this->ajaxReturn($data,'json');exit;
            }else{
                $data['status']=0;
                $this->ajaxReturn($data,'json');exit;
            }
        }
        $notice = M('document')->where('category_id=41 AND status=1')->limit(0,$pagesize)->select();
        $article = M('document_article')->select();
        foreach ($notice as $no){
            foreach ($article as $ar){
                if($no['id'] == $ar['id']){
                    $path =  M('picture')->where(['id'=>$no['cover_id']])->find();
                    $no['path'] =$path['path'];
                    $no['content'] = $ar['content'];
                    $data[] = $no;
                }
            }
        }
//        var_dump($data);exit;
        $this->assign('data',$data);
        $this->display();
    }
    public function detail()
    {
        $doc = M('document');
        $id = I('get.id');
        $list = $doc->join('left join document_article as da on document.id = da.id')->field('document.*,da.content')->where(['document.id'=>$id])->find();
        M('Document')->where('id=' . $id)->setInc('view', 1);
        $this->assign('list',$list);
        $this->display();
    }

    public function apply()
    {
        if(is_login()){
            //接受到活动的id
            $id = I('get.id');
            $username = $_SESSION['onethink_home']['user_auth']['username'];
            //实例活动管理对象
            $act = M('activity');
            //根据该用户名到活动管理表查询该用户是否已经申请过该活动
            $rs = $act->where(['activity_id'=>$id,'username'=>$username])->find();
            if(!$rs){
                $act->username = $username;
                $act->activity_id = $id;
                $act->create_time = time();
                if($act->add()){
                    $this->ajaxReturn(['status'=>1]);
                }
            }else{
                //该用户已经申请过该活动
                $this->ajaxReturn(['status'=>-1]);
            }
        }else{
            $this->ajaxReturn(['status'=>0]);
        }
    }
    public function error()
    {
        $this->display('Center/error');
    }
}