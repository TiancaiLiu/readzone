<?php
namespace Admin\Controller;
use Think\Controller;

Class CommonController extends Controller {

	Public function __construct() {
		parent::__construct();
		if(!session('id')){
			$this->error('请先登录系统！', U('Login/index'));
		}
	}

}
?>
