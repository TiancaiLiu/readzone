<?php
namespace Admin\Model;
use Think\Model\ViewModel;

Class ArticleViewModel extends ViewModel {
	
	public $viewFields = array(
		'Article' => array('id', 'title', 'pic', '_type'=>'LEFT'),
		'Cate' => array('catename', '_on'=>'Article.cateid=Cate.id'),
		); 
}
?>