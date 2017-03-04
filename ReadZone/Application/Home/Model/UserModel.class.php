<?php
namespace Home\Model;
use Think\Model;

Class UserModel extends Model {
	protected $_validate = array(
		//注册自动验证
		array('username','require','用户名不得为空！',1,'regex',3),
		array('username','','该用户名已经被注册！请重试！',1,'unique',3),
		array('password','require','密码不得为空！',1,'regex',3),
		array('repassword','require','确认密码不得为空！',1,'regex',3),
		array('repassword','password','两次输入密码不一致！',0,'confirm'),
		array('nickname','require','昵称不得为空！',1,'regex',3),
		array('username','','该昵称已被使用！换一个试试吧！',1,'unique',3),
		//登录自动验证
		array('username','require','请输入用户名！',1,'regex',4), 
        array('password','require','请输入密码！',1,'regex',4),
		);

	Public function login() {
		$password = $this->password;
		$info = $this->where(array('username'=>$this->username))->find();
		if($info) {
			if($info['password']==$password) {
				session('id', $info['id']);
				session('username', $info['username']);
				session('nickname', $info['nickname']);
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

}
?>