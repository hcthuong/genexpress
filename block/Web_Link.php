<?php
	global $db,$smarty,$function,$template;
	$content = '';
	$oLink = new Link;
	include('data/link_setting.php');
	global $resize_width_right,$resize_height_right;
	$str = $oLink->show_all_link_client(2);//1 ben trai - 2 ben fai
	for($i=0;$i<count($str);$i++){
		$content .= '<a href="'.$str[$i]['Url'].'" target="_blank" title="'.$str[$i]['Title'].'">
		<img src="'.URL_LINK_THUMB.$str[$i]['Image_Name'].'" width="241"/></a>';
	}
	return $content;
?>