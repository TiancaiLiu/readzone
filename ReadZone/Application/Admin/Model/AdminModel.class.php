<?php
namespace Admin\Model;
use Think\Model;

Class AdminModel extends Model {

	protected $_validate = array(
		//array(验证字段1, 验证规则, 错误提示, [验证条件, 附加规则, 验证时间])
		array('username','require','管理员名称不得为空！',1,'regex',3),
		array('password','require','密码不得为空！',1,'regex',1),
		array('username','','管理员名称不得重复！',1,'unique',1),
		//登录时自动验证
		array('username','require','管理员名称不得为空！',1,'regex',4),
		array('password','require','密码不得为空！',1,'regex',4),
		);

	Public function login() {
		$password = $this->password; //password为表单传递的值
		$where = array('username' => $this->username); //username为表单传递的值
		$info = $this->where($where)->find();
		if($info) {
			if($info['password'] == $password) {
				session('id', $info['id']); //将id和username传递到后台首页，可以实现判断是否通过账号密码登录
				session('username', $info['username']);
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