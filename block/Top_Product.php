<?php
	global $db,$smarty,$function,$template;
	$content = '';
	$oProduct = new Product;
	$str = $oProduct->show_top_product(0,'Create_Time','desc',0, 10);
	$content .= '<div class="slide_product"><ul>';
	for($i=0;$i<count($str);$i++){
		$content .= '<li id="product_img"><img src="'.URL_PRODUCT_THUMB.$str[$i]['Image_Name'].'" width="150px" /><br /><span><b><a href="'.URL_HOMEPAGE.'/product/view/'.$str[$i]['Category_ID'].'/'.$str[$i]['Product_ID'].'/view.html" id="product_a">'.$str[$i]['Product_Name'].'</a></b></span><br />&nbsp;</li>';
	}
	$content .= '</ul>';
	return $content;
?>