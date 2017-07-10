<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/10
 * Time: 22:49
 */

namespace Admin\Controller;


class OwnersController extends AdminController
{
    public function index()
    {
        $owners = M('owners');
        $list = $owners->select();
        $this->assign('list',$list);
        $this->display();
    }

    public function setStatus($Model='owners'){

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
                $this->resume($Model, $map, array('success'=>'审核通过','error'=>'操作失败'));
                break;
            case 1  :
                $this->_over($Model, $map, array('success'=>'审核不通过','error'=>'操作失败'));
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
        if(M('owners')->where($map)->delete()){
            //记录行为
            action_log('update_owner', 'owner', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }

    //报修详情页面
    public function detail()
    {
        $id = I('get.id');
        $list = M('owners')->where(['id'=>$id])->find();
        $this->assign('list',$list);
        $this->display();

    }
}