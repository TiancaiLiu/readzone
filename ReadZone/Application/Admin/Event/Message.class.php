<?php
namespace Admin\Event;

Class Message {
	Static Public function unlimitedForLevel($message, $html='--', $pid = 0, $level = 0){
		$arr = array();
		foreach($message as $v){
			if($v['pid'] == $pid){
				$v['level'] = $level + 1;
				$v['html'] = str_repeat($html, $level);
				$arr[] = $v;
				$arr = array_merge($arr,self::unlimitedForLevel($message, $html, $v['id'], $level+1));
			}
		}
		return $arr;
	}
}
?>