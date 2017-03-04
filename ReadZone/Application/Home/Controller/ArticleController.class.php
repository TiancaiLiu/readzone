<?php
namespace Home\Controller;
use Think\Controller;

Class ArticleController extends CommonController {
	Public function index() {
		$arts = D('Article')->find(I('id'));
		$this->assign('arts',$arts);
		$this->catename($arts['cateid']);
		$this->other(I('id'));
		$this->display();
	}

	Public function catename($cateid) {
		$cates = D('cate')->find($cateid);
		$this->assign('catename', $cates['catename']);
	}

	Public function other($id) {
		$article = D('Article');
		$articles = $article->find($id);
		$cateid = $articles['cateid'];
		$prevs = $article->where('id<'.$id)->where(array('cateid'=>$cateid))->order('id DESC')->find();
		$nexts = $article->where('id>'.$id)->where(array('cateid'=>$cateid))->order('id ASC')->find();
		$this->assign('prevs',$prevs);
		$this->assign('nexts', $nexts);
	}

}

?>