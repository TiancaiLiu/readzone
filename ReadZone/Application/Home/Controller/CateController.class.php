<?php
namespace Home\Controller;
use Think\Controller;

Class CateController extends CommonController {
	Public function index() {
		$cateid = I('id');
		$article = D('Article');
		$where = array('cateid'=>$cateid);
		$count = $article->where($where)->count();
		$Page = new \Think\Page($count, 2);
		$show  = $Page->show();
		$limit = $Page->firstRow.','.$Page->listRows;
		$list = $article->where($where)->order('time DESC')->limit($limit)->select();
		$this->assign('page', $show);
		$this->assign('list', $list);
		$this->current();
		$this->display();
	}

	public function current() {
		$current = I('id');
		$this->assign('current', $current);
	}
}
?>