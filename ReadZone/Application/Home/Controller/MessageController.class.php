<?php
namespace Home\Controller;
use Think\Controller;

Class MessageController extends CommonController {
	Public function index() {
		$message = D('MessageView');
		$where = array('pid'=>0);
		$count = $message->where($where)->count();
		$Page = new \Think\Page($count, 4);
		$show = $Page->show();
		$limit = $Page->firstRow.','.$Page->listRows;		
		$list = $message->order('id DESC')->where($where)->limit($limit)->select();
		// $map['pid'] = array('neq', 0);
		// $reply = $message->where($map)->select();
		// var_dump($reply);die;
		$this->assign('count',$count);
		$this->assign('list', $list);
		$this->assign('page', $show);
		$this->display();
	}

	Public function add() {
		$message = D('Message');
		if(IS_POST) {
			$data['content'] = I('content');
			$data['time'] = time();
			$data['uid'] = $_SESSION['id'];
			if($message->create($data)) {
				if($message->add()) {
					$this->success('留言成功',U('index'));
				}else{
					$this->error('留言失败！');
				}
 			}else{
 				$this->error($message->getError());
 			}

 			return;
		}
	}

	//留言回复
	Public function reply() {
		$message = D('Message');
		if(IS_POST) {
			$data['content'] = I('content');
			$data['time'] = time();
			$data['uid'] = $_SESSION['id'];
			$data['pid'] = I('pid');
			if($message->create($data)) {
				if($message->add()) {
					$this->success('回复成功!',U('index'));
				}else{
					$this->error('回复失败！');
				}
			}else{
				$this->error($message->getError());
			}
		}

		return;
	}
}
?>