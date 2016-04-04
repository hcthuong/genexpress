<?php
	global $db,$smarty,$function,$template;
	$content = '';
	$oNews = new News;
	$str = $oNews->show_top_news(1,'Create_Time','desc',0, 10);
	$content = '<ul id="nav_tintuc">';
	for($i=0;$i<count($str);$i++){
		$content .= '<li><span><b><a href="'.URL_HOMEPAGE.'/news/view/'.$str[$i]["Category_ID"].'/'.$str[$i]["News_ID"].'/view.html">'.$str[$i]["Title"].'</a></b></span></li>';
	}
	$content .= '</ul>';
	return $content;
?>
