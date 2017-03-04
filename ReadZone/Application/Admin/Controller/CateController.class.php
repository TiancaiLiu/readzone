<?php
namespace Admin\Controller;
use Think\Controller;

Class CateController extends Controller {
	//文章分类视图
	Public function lst(){
		$cate = D('Cate');	//选择数据表
		$count = $cate->count();
		$Page = new \Think\Page($count, 8);  //分页处理
		$show = $Page->show(); //显示分页
		$limit = $Page->firstRow.','.$Page->listRows;
		$list = $cate->order('sort DESC')->limit($limit)->select();
		$this->assign('list', $list);
		$this->assign('page', $show);
		//var_dump($cate->select());

		$this->display();
	}
	//分类搜索方法
	Public function search(){
		$data = $_POST['keywords'];
		if($data == null){
			echo "<script>alert('输入不能为空，请重试！');history.go(-1);</script>";
		}else{
			$keywords = '%' . $_POST['keywords'] . '%';
			$cate = D('Cate');
			$where['catename'] = array('like', $keywords); 
			$list = $cate->where($where)->select();
			$this->assign('list',$list);
		}
		$this->display('lst');
	}

	//添加文章分类视图
	Public function add(){
		$this->display();
	}

	//添加文章分类表单处理
	Public function addCate(){
		$cate = D('Cate');
		if(IS_POST) {
			$data['catename'] = I('catename');
			if($cate->create($data)) {//创建数据
				if($cate->add()) {//存数据 insert语句
					$this->success('添加栏目成功！', U('lst'));
				}else{
					$this->error('添加栏目失败！');
				}
 			}else{
 				$this->error($cate->getError());
 			}

 			return;
		}
	}


	//修改文章分类视图
	Public function edit(){
		$cate = D('Cate');
        if(IS_POST){
            $data['catename'] = I('catename');
            $data['id'] = I('id');
            if($cate->create($data)) {
                $save = $cate->save();   //update语句
                if( $save !== false) {
                    $this->success('修改栏目成功！',U('lst'));
                }else{
                    $this->error('修改栏目失败！');
                }
            }else{
                $this->error($cate->getError());
            }
            return;
        }
        $cates = $cate->find(I('id'));
        $this->assign('cates',$cates);
        $this->display();
	}

	//删除栏目操作
	Public function del(){
		$cate = D('Cate');
		$id = I('id');
		if($cate->delete($id)) { //delete语句
			$this->success('删除栏目成功！', U('lst'));
		}else{
			$this->error('删除栏目失败！');
		}

	}

	//排序操作
	public function sort(){
        $cate = D('cate');
        foreach ($_POST as $id => $sort) {
            $cate->where(array('id'=>$id))->setField('sort',$sort); //setField用于更行字段
        }

        $this->success('排序成功！',U('lst'));

    }
}
?>