<?php
namespace Admin\Controller;
use Think\Controller;

Class ArticleController extends Controller {

	//文章列表视图
	Public function lst() {
		$article = D('ArticleView');
		$count = $article->count();
		$Page = new \Think\Page($count,9);
		$show = $Page->show();
		$limit = $Page->firstRow.','.$Page->listRows;
		$list = $article->order('id DESC')->limit($limit)->select();
		$this->assign('list', $list);
		$this->assign('page', $show);
		$this->display();
	}

	//添加文章
	Public function add() {
		$article = D('Article');
    	if(IS_POST){
            $data['title'] = I('title');
            $data['content'] = I('content');
            $data['desc'] = I('desc');
            $data['cateid'] = I('cateid');
    		$data['time'] = time();
            if($_FILES['pic']['tmp_name'] != '') {
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize  = 3145728 ;// 设置附件上传大小
                $upload->exts     = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->savePath = './Public/Uploads/'; // 设置附件上传目录
                $upload->rootPath = './'; // 设置附件上传目录
                $info = $upload->uploadOne($_FILES['pic']);
                if(!$info) {
                    $this->error($upload->getError());
                }else{
                   $data['pic'] = $info['savepath'].$info['savename'];
                }
            }
            if($article->create($data)) {
                if($article->add()) {
                    $this->success('添加文章成功！', U('lst'));
                }else{
                    $this->error('添加文章失败！');
                }
            }else{
                $this->error($article->getError());
            }

            return;
    	}
        $cateres = D('Cate')->select();
        $this->assign('cateres', $cateres);
		$this->display();
	}

	//文章搜索
	Public function search() {
		$data = $_POST['keywords'];
		if($data == null){
			echo "<script>alert('输入不能为空，请重试！');history.go(-1);</script>";
		}else{
			$keywords = '%' . $_POST['keywords'] . '%';
			$article = D('Article');
			$where['title'] = array('like', $keywords); 
			$list = $article->where($where)->limit($limit)->select();
			$this->assign('list',$list);
		}
		$this->display('lst');
	}
	//修改操作
	Public function edit(){
		$article = D('Article');
		if(IS_POST){
            $data['title'] = I('title');
            $data['content'] = I('content');
            $data['desc'] = I('desc');
            $data['cateid'] = I('cateid');
    		$data['id'] = I('id');
            if($_FILES['pic']['tmp_name'] != '') {
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize  = 3145728 ;// 设置附件上传大小
                $upload->exts     = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->savePath = './Public/Uploads/'; // 设置附件上传目录
                $upload->rootPath = './'; // 设置附件上传目录
                $info = $upload->uploadOne($_FILES['pic']);
                if(!$info) {
                    $this->error($upload->getError());
                }else{
                   $data['pic'] = $info['savepath'].$info['savename'];
                }
            }
            if($article->create($data)) {
            	$save = $article->save();
            	if($save !== false) {
            		$this->success('修改文章成功！', U('lst'));
            	}else{
            		$this->error('修改文章失败！');
            	}
            }else{
            	$this->error($article->getError());
            }
            return;
        }
        $article_s = $article->find(I('id'));
        $this->assign('article_s', $article_s);
        $cateres = D('Cate')->select();
        $this->assign('cateres', $cateres);
		$this->display();
	}

	//删除操作
	Public function del() {
		$article = D('Article');
		$id = I('id');
		if($article->delete($id)) {
			$this->success('删除文章成功！', U('lst'));
		}else{
			$this->error('删除文章失败！');
		}
	}
}

?>