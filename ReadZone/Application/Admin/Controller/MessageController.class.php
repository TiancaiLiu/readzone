<?php
namespace Admin\Controller;
use Think\Controller;

Class MessageController extends CommonController {
	
	
	//留言列表视图
	Public function lst() {
		$info = new \Admin\Event\Message();				
		//$count = D('MessageView')->count();
		//$Page = new \Think\Page($count,10);
		//$show = $Page->show();
		$limit = $Page->firstRow.','.$Page->listRows;
		$list = D('MessageView')->order('id DESC')->limit($limit)->select();
		$list = $info->unlimitedForLevel($list, '&nbsp;&nbsp;&nbsp;&nbsp;----->');
		// var_dump($list);
		$this->assign('list', $list);
		//$this->assign('page', $show);
		$this->display();
	}
	//留言搜索
	Public function search() {
		$data = $_POST['keywords'];
		if($data == null){
			echo "<script>alert('输入不能为空，请重试！');history.go(-1);</script>";
		}else{
			$keywords = '%' . $_POST['keywords'] . '%';
			$message = D('Message');
			$where['content'] = array('like', $keywords); 
			$list = $message->where($where)->limit($limit)->select();
			$this->assign('list',$list);
		}
		$this->display('lst');
	}

	//删除留言
	Public function del() {
		$message = D('Message');
		$id = I('id');
		if($message->delete($id)) {
			$this->success('删除留言成功！',U('lst'));
		}else{
			$this->error('删除文章失败！');
		}
	}
}
?>