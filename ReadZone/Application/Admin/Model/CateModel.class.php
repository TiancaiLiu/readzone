<?php
namespace Admin\Model;
use Think\Model;

Class CateModel extends Model {

	Protected $_validate = array(
		array('catename','require','栏目名称不得为空！',1,'regex',3),
		array('catename','','栏目名称不得重复！',1,'unique',3),
		);
}
?>