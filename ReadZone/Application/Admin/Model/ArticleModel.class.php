<?php
namespace Admin\Model;
use Think\Model;

Class ArticleModel extends Model {
	protected $_validate = array(
		array('title','require','标题不得为空！',1,'regex',3), 
        array('cateid','require','所属栏目不得为空！',1,'regex',3), 
       	array('content','require','文章内容不得为空！',1,'regex',3), 
		);
}
?>