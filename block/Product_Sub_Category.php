<?php
	global $db,$smarty,$function,$template,$module;
	$content = '';
	$oCategory = new Category;
	include('data/product_setting.php');
	global $order_field_category,$order_type_category;
	$rs = $oCategory->show_all_parent_category(1,'product',$order_field_category,$order_type_category,0,0);
	$content .= '<ul id="slide">';
	for($i=0;$i<count($rs);$i++){ 
		$sub[$i] = $oCategory->show_all_product_sub_category('product',$rs[$i]['Category_ID'],$order_field_category,$order_type_category);
		if(count($sub[$i]) == 0){
			$content .= '<li class="top"><img style="vertical-align:middle" src="'.URL_HOMEPAGE.'/templates/'.$template.'/images/ico.gif" />&nbsp;<a href="'.URL_HOMEPAGE.'/product/cat/'.$rs[$i]["Category_ID"].'.html">'.$rs[$i]['Category_Name'].'</a></li>';
		}else{
			$content .= '<li class="sub"><img style="vertical-align:middle" src="'.URL_HOMEPAGE.'/templates/'.$template.'/images/ico.gif" />&nbsp;'.$rs[$i]['Category_Name'];
			$content .= '<div><ul>';
			for($j=0;$j<count($sub[$i]);$j++){
				$content .= '<li><a href="'.URL_HOMEPAGE.'/product/cat/'.$sub[$i][$j]["Category_ID"].'.html">&nbsp;&nbsp;|-&nbsp;'.$sub[$i][$j]['Category_Name'];
				$content .= '</a></li>';
			}
			$content .= '<li>'._VIEWMORE.'</li></ul></div></li>';
		}
	}
	$content .= '</ul>';
	return $content;
?>