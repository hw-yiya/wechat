<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/8
 * Time: 16:16
 */

namespace Wechat\Controller;


use Think\Controller;
use Think\Page;

class ShopController extends Controller
{
    public function index($p=1)
    {
        $data = [];
        $pagesize = 1;
        if (IS_AJAX) {
            $model = M('document')->where('category_id=43 AND status=1')->limit(($p-1) * $pagesize, $pagesize)->select();

            $page = I('get.p');
            $article = M('document')->select();
            foreach ($model as $no) {
                foreach ($article as $ar) {
                    if ($no['id'] == $ar['id']) {
                        $no['create_time'] = date('Y-m-d', $no['create_time']);
                        $no['deadline'] = date('Y-m-d', $no['deadline']);
                        $path = M('picture')->where(['id' => $no['cover_id']])->find();
                        $no['path'] = $path['path'];
                        $no['content'] = $ar['content'];
                        $data[] = $no;
                    }
                }
            }
            if ($data) {

                $this->ajaxReturn($data, 'json');
                exit;
            } else {
                $data['status'] = 0;
                $this->ajaxReturn($data, 'json');
                exit;
            }
        }
        $notice = M('document')->where('category_id=43 AND status=1')->limit(0, $pagesize)->select();
        $article = M('document_article')->select();
        foreach ($notice as $no) {
            foreach ($article as $ar) {
                if ($no['id'] == $ar['id']) {
                    $path = M('picture')->where(['id' => $no['cover_id']])->find();
                    $no['path'] = $path['path'];
                    $no['content'] = $ar['content'];
                    $data[] = $no;
                }
            }
        }
//        var_dump($data);exit;
        $this->assign('data', $data);
        $this->display();
    }
    public function detail()
    {

        $doc = M('Document');
        $id = I('get.id');
        $shop = $doc->join('left join document_article as d on document.id = d.id')->field('document.*,d.content')->where(['document.id'=>$id])->find();
        M('Document')->where('id=' . $id)->setInc('view', 1);
        $this->assign('shop',$shop);
        $this->display('detail');
    }

}