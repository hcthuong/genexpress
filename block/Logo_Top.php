<?php
	global $db,$smarty,$function,$template;
	$content = '';
	$oLink = new Link;
	$str = $oLink->show_all_link_client(1);//1 ben trai - 2 ben fai
	for($i=0;$i<count($str);$i++){
		$content .= '<a href="'.$str[$i]['Url'].'" target="_blank" title="'.$str[$i]['Title'].'">
		<img src="'.URL_LINK_THUMB.$str[$i]['Image_Name'].'" height="78" /></a>&nbsp;';
	}
	return $content;
?>