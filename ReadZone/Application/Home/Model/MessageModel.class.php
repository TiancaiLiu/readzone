<?php
namespace Home\Model;
use Think\Model;

Class MessageModel extends Model {
	protected $_validate = array(
		array('content','require','留言不能为空！',1,'regex',3),
		array('uid','require','您还未登录，请登录后再回复!',1,'regex',3),
		);
}
?>