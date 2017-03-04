<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    //首页视图
    public function index(){
    	$article = D('Article');
    	$count = $article->count();
    	$Page = new \Think\Page($count,6);
    	$show = $Page->show();
    	$limit = $Page->firstRow.','.$Page->listRows;
    	$list = $article->order('time DESC')->limit($limit)->select();
    	$this->assign('list', $list);
    	$this->assign('page', $show);
		$this->display();
    }

    //注册方法
    Public function add() {
        $user = D('User');
        if(IS_POST) {
            $data['username'] = I('username');
            $data['password'] = I('password');
            $data['repassword'] = I('repassword');
            $data['nickname'] = I('nickname');
            if($_FILES['pic']['tmp_name'] != ''){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize   =     3145728 ;// 设置附件上传大小
                $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录
                $upload->rootPath  =      './'; // 设置附件上传目录
                $info = $upload->uploadOne($_FILES['pic']);
                if(!$info){
                    $this->error($upload->getError());
                }else{
                   $data['pic']=$info['savepath'].$info['savename'];
                }
            }
            if($user->create($data)) {
                if($user->add()) {
                    $this->success('注册成功！快去登录吧！',U('index'));
                }else {
                    $this->error('注册失败！请重新试试！');
                }
            }else{
                $this->error($user->getError());
            }

            return;
        }        
    }

    //登录视图
    Public function loginfun(){
        $user = D('User');
        if(IS_POST) {
            if($user->create($_POST,4)) {
                if($user->login()){
                    $this->success('登录成功，跳转中......', U('Index/index'));
                }else{
                    $this->error('用户名或密码错误！');
                }
            }else{
                $this->error($user->getError());
            }

            return;
        }
        if(session('id')) {
            $this->error('您已经登录，请勿重复登录！', U('Index/index'));
        }
    }   
}