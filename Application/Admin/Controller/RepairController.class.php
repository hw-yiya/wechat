<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/10
 * Time: 10:39
 */

namespace Admin\Controller;


class RepairController extends AdminController
{
    public function index()
    {
        $repair = M('repair');
        $list = $repair->select();
        $this->assign('list',$list);
        $this->display();
    }

    public function add()
    {
        //管理员添加报修
        if(IS_POST){
            //dump($_POST);exit;
            $repair = D('Wechat/repair');
            $data = $repair->create();
            if($data){
                $id = $repair->add();
                if($id){
                    $this->success('报修成功', U('Repair/index'));
                } else {
                    $this->error('报修失败');
                }
            } else {
                $this->error($repair->getError());
            }

        }

        $this->display('edit');
    }

    public function setStatus($Model='repair'){

        $ids    =   I('request.ids');
        $status =   I('request.status');
        if(empty($ids)){
            $this->error('请选择要操作的数据');
        }

        $map['id'] = array('in',$ids);
        switch ($status){
            case -1 :
                $this->delete($Model, $map, array('success'=>'删除成功','error'=>'删除失败'));
                break;
            case 0  :
                $this->resume($Model, $map, array('success'=>'已经接受处理','error'=>'操作失败'));
                break;
            case 1  :
                $this->_over($Model, $map, array('success'=>'处理完成','error'=>'操作失败'));
                break;
            default :
                $this->error('参数错误');
                break;
        }
    }

    private function _over ( $model , $where = array() , $msg = array( 'success'=>'操作成功！', 'error'=>'操作失败！')){
        $data    =  array('status' => 2);
        $this->editRow( $model , $data, $where, $msg);
    }

    public function del(){
        $id = array_unique((array)I('id',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('id' => array('in', $id) );
        if(M('repair')->where($map)->delete()){
            //记录行为
            action_log('update_repair', 'repair', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }

    //报修详情页面
    public function detail()
    {
        $id = I('get.id');
        $list = M('repair')->where(['id'=>$id])->find();
        $this->assign('list',$list);
        $this->display();

    }

}