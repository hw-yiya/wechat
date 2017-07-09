<?php
namespace Admin\Controller;

use Admin\Model\FamilyModel;
use Think\Controller;
use Think\Page;

class FamilyController extends AdminController{
    public function add(){

        if(IS_POST) {

            $User = D("Family"); // 实例化User对象
            $User->end_time = $_POST['end_time'];
// 根据表单提交的POST数据创建数据对象
            if ($User->create()) {
                $result = $User->add(); // 写入数据到数据库
                if ($result) {
                    $this->success('新增成功', U('index'));
                } else {
                    $this->error('新增失败');
                }
            }
        }
        $this->display();
    }
    public function index(){
        $model=new FamilyModel();
        $count = $model->count();
        $page = new Page($count,3);
        if($count>$page->listRows){
            $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% %HEADER%');
        }
        $pageHtml = $page->show();

        $list = $model->where('status=1')->order('end_time')->limit($page->firstRow,$page->listRows)->select();

        $this->assign('list',$list);
        $this->assign('pageHtml',$pageHtml);
        $this->display();
    }
    public function edit($id){
        if(IS_POST) {
//            var_dump($_POST);exit;
            $User = D("Family"); // 实例化User对象
            $User->end_time = $_POST['end_time'];
// 根据表单提交的POST数据创建数据对象
            if ($User->create()) {
                $result = $User->add(); // 写入数据到数据库
                if ($result) {
                    $this->success('修改成功', U('index'));
                } else {
                    $this->error('修改失败');
                }
            }
        }
        $model=new FamilyModel();
        $date=$model->Edit($id);
//        var_dump($date);exit;
        $this->assign('date',$date);
        $this->display();
    }
    public function del(){
        $id=$_GET['id'];
        $Form = M('Family');
        if($Form->delete($id)){
            $this->success('删除', U('index'));
        }else {
            $this->error('删除失败');
        }
        $this->display();

    }
}