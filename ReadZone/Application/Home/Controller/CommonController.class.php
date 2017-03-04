<?php
namespace Home\Controller;
use Think\Controller;

Class CommonController extends Controller {
	public function __construct() {
		parent::__construct();
		$this->nav();
		$this->link();
		$this->news();
	}

	Public function nav() {
		$cate = D('Cate');
		$cateres = $cate->order('sort DESC')->select();
		$this->assign('cateres', $cateres);
	}

	Public function link() {
		$link = D('Link');
		$linkres = $link->order('sort DESC')->select();
		$this->assign('linkres', $linkres);
	}

	Public function news() {
		$article = D('Article')->order('time DESC')->limit(5)->select();
		$this->assign('article', $article);
	}

    //退出登录
    Public function logout() {
    	session(null);
    	$this->success('退出成功，跳转中......', U('Index/index'));
    }
	
}
?>