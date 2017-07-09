<?php
namespace Wechat\Controller;

use Think\Controller;

class ArticleController extends Controller{
    public function Index()
    {
        $doc = M('Document');
//        $list = $doc->select();
        $list = $doc
            ->alias('d')
            ->field('d.*,p.path')
            ->where(['category_id'=>2])
            ->join('picture as p ON d.cover_id = p.id')
            ->select();
//        $list = $doc->join('as Document left join picture on Document.cover_id = picture.id')->field('document.*,picture.path')->where(['category_id'=>40])->select();
//        dump($list);exit;


        $this->assign('list',$list);
        $this->display();
    }

    public function detail()
    {

        $doc = M('Document');
        $id = I('get.id');
        $list = $doc->join('left join document_article as da on document.id = da.id')->field('document.*,da.content')->where(['document.id'=>$id])->find();
        $this->assign('list',$list);
        $this->display('detail');
    }
}