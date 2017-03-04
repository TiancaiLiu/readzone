<?php
namespace Admin\Controller;
use Think\Controller;

Class LinkController extends Controller {

	//链接管理列表视图
	Public function lst() {
		$link = D('Link');
		$count = $link->count();
		$Page = new \Think\Page($count, 5);
		$show = $Page->show();
		$limit = $Page->firstRow.','.$Page->listRows;
		$list = $link->order('sort DESC')->limit($limit)->select();
		$this->assign('list', $list);
		$this->assign('page', $show);
		$this->display();
	}

	//添加链接
	Public function add() {
		$link = D('Link');
		if(IS_POST) {
			$data['title'] = I('title');
			$data['url'] = I('url');
			$data['desc'] = I('desc');
			if($link->create($data)) {
				if($link->add()) {
					$this->success('新增链接成功！', U('lst'));
				}else{
					$this->error('新增链接失败！');
				}
			}else{
				$this->error($link->getError());
			}
			return;
		}
		$this->display();
	}

	//链接修改
	Public function edit() {
		$link = D('Link');
		if(IS_POST) {
			$data['title'] = I('title');
			$data['url'] = I('url');
			$data['desc'] = I('desc');
			$data['id'] = I('id');
			if($link->create($data)) {
				$save = $link->save();
				if($save !== false) {
					$this->success('修改链接成功！', U('lst'));
				}else{
					$this->error('修改链接失败！');
				}
			}else{
				$this->error($link->getError());
			}
			return;
		}
		$links = $link->find(I('id'));
		$this->assign('links',$links);
		$this->display();
	}

	//链接查询
	Public function search() {
		$data = $_POST['keywords'];
		if($data == null){
			echo "<script>alert('输入不能为空，请重试！');history.go(-1);</script>";
		}else{
			$keywords = '%' . $_POST['keywords'] . '%';
			$link = D('Link');
			$where['title'] = array('like', $keywords); 
			$list = $link->where($where)->limit($limit)->select();
			$this->assign('list',$list);
		}
		$this->display('lst');
	}

	//链接删除
	Public function del() {
		$link = D('Link');
		if($link->delete(I('id'))){
            $this->success('删除链接成功！',U('lst'));
        }else{
            $this->error('删除链接失败！');
        }
	}

	//链接排序
	Public function sort() {
        $link = D('Link');
        foreach ($_POST as $id => $sort) {
            $link->where(array('id'=>$id))->setField('sort', $sort); //setField用于更行字段
        }
        var_dump($sort);
        $this->success('排序成功！',U('lst'));

    }
}
?>