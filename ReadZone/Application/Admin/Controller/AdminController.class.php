<?php
namespace Admin\Controller;
use Think\Controller;
Class AdminController extends CommonController {

	//首页视图
	Public function lst() {
		$admin = D('Admin');//选择数据表
		$count = $admin->count();
		$Page = new \Think\Page($count,4);
		$show = $Page->show(); //显示分页
		$limit = $Page->firstRow.','.$Page->listRows;
		$list = $admin->order('id DESC')->limit($limit)->select();
		$this->assign('list',$list);
		$this->assign('page',$show);		
		$this->display();
	}

	//查找
	Public function search() {
		$data = $_POST['keywords'];
		if($data == null){
			echo "<script>alert('输入不能为空，请重试！');history.go(-1);</script>";
		}else{
			$keywords = '%' . $_POST['keywords'] . '%';
			$admin = D('Admin');
			$where['username'] = array('like', $keywords); 
			$list = $admin->where($where)->limit($limit)->select();
			$this->assign('list',$list);
		}
		$this->display('lst');
	}

	//新增管理员视图
	Public function add() {
		$this->display(); 
	}

	//新增管理员表单处理
	Public function addUser(){
		$admin = D('Admin');
		if(IS_POST) {
			$data['username'] = I('username');
			$data['password'] = I('password');
			if($admin->create($data)){ //创建数据
				if($admin->add()) { //往数据库新增数据
					$this->success('新增管理员成功！', U('lst'));
				}else{
					$this->error('添加管理员失败！');
				}
			}else{
				$this->error($admin->getError());
			}

			return;
		}
	}

	//修改视图
	Public function edit() {
		$admin = D('Admin');
		if(IS_POST) {
			$data['username'] = I('username');
			$data['id'] = I('id');
			$admin_c = $admin->find($data['id']); //将找到的username赋给一个新的变量
			$password = $admin_c['password'];
			if(I('password')) {
				$data['password'] = I('password');
			}else{
				$data['password'] = $password;
			}
			if($admin->create($data)) {
				$save = $admin->save();  // updata操作
				if($save !== false) {
					$this->success('修改管理员成功！', U('lst'));
				}else{
					$this->error('修改管理员失败！');
				}
			}else{
				$this->error($admin->getError());
			}

			return;
		}
		$admin_s = $admin->find(I('id'));
		$this->assign('admin_s', $admin_s);
		$this->display();
	}

	//删除操作
	Public function del() {
		$admin = D('Admin');
		$id = I('id');
		if($id == 1) {
			$this->error('超级管理员不能删除！');
		}else{
			if($admin->delete($id)) {
				$this->success('删除管理员成功!',U('lst'));
			}else{
				$this->error('删除管理员失败！');
			}
		}
	}

	//退出登录
	Public function logout(){
		session_destroy();
		//session(null); //方法二
		$this->success('退出成功跳转中...', U('Login/index'));
	}


}

?>