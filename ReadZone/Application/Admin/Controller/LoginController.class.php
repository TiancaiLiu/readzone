<?php
namespace Admin\Controller;
use Think\Controller;

Class LoginController extends Controller {

	Public function index(){
		$admin = D('Admin');
		if(IS_POST) {
			if($admin->create($_POST,4)) {
				if($admin->login()) {
					$this->success('登陆成功，正在跳转...', U('Index/index'));
				}else{
					$this->error('您输入的用户名或密码有误，请重新输入！');
				}
			}else{
				$this->error($admin->getError());
			}

			return;
		}
		$this->display();
	}
}

?>