<?php
namespace Admin\Controller;

class ArtivityController extends AdminController{
    public function index()
    {
        //查询出所有活动管理信息
        $act = M('activity');
        $list = $act->join('as a join document as b on a.activity_id = b.id')->field('a.*,b.title,b.description,b.deadline')->select();
        //dump($list);exit;
        $this->assign('list',$list);
        $this->display();
    }

    public function setStatus($Model=CONTROLLER_NAME){

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
                $this->_fail($Model, $map, array('success'=>'审核不通过','error'=>'操作失败'));
                break;
            case 1  :
                $this->resume($Model, $map, array('success'=>'审核已通过','error'=>'操作失败'));
                break;
            default :
                $this->error('参数错误');
                break;
        }
    }

    private function _fail ( $model , $where = array() , $msg = array( 'success'=>'操作成功！', 'error'=>'操作失败！')){
        $data    =  array('status' => -1);
        $this->editRow( $model , $data, $where, $msg);
    }

    public function del(){
        $id = array_unique((array)I('id',0));

        if ( empty($id) ) {
            $this->error('请选择要操作的数据!');
        }

        $map = array('id' => array('in', $id) );
        if(M('Activity')->where($map)->delete()){
            //记录行为
            action_log('update_activity', 'activity', $id, UID);
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }
}