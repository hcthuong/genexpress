<?php
	global $db,$smarty,$function,$template;
	$content = '';
	$oCategory = new Category;
	global $order_field_category,$order_type_category;
	$str = $oCategory->show_all_parent_category(0,'service',$order_field_category,$order_type_category,0,0);
	$content = '<ul id="nav_tintuc">';
	for($i=0;$i<count($str);$i++){
		$content .= '<li><span><b><a href="'.URL_HOMEPAGE.'/download/cat/'.$str[$i]["Category_ID"].'.html">'.$str[$i]["Category_Name"].'</a></b></span></li>';
	}
	$content .= '</ul>';
	return $content;
?>
