<?php
namespace Home\Model;
use Think\Model\ViewModel;

Class MessageViewModel extends ViewModel {
	public $viewFields = array(
		'Message' => array('id','content','time','pid','_type'=>'LEFT'),
		'User' => array('nickname','_on'=>'Message.uid=User.id'),
		);
}
?>