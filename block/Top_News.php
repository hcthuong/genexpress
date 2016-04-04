<?php
	global $db,$smarty,$function,$template,$limit_rs;
	$content = '';
	$oNews = new News;
	$str = $oNews->show_top_news(0,'News_ID','desc',0, 5);
	$content = '<ul id="news">';
	$sum = count($str);
	for($i=0;$i<$sum;$i++){
		$content .= '<li><img src="'.URL_NEWS_THUMB.$str[$i]["Image_Name"].'" /><span><a href="'.URL_HOMEPAGE.'/news/view/'.$str[$i]["News_ID"].'/view.html"><b>'.$str[$i]["Title_Cut"].'</b></a><br />'.$str[$i]["Summary_Cut"].'</span></li>';
	}
	$content .= '<li style="text-align:right;"><a style="float:right" href="'.URL_HOMEPAGE.'/news.html">Xem th&ecirc;m &raquo;</a></li></ul>';
	return $content;
?>
