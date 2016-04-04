<?php
	global $db,$smarty,$function,$template,$limit_rs;
	$content = '';
	$oProduct = new Product;
	$str = $oProduct->show_top_product(0,'Create_Time','desc',0, $limit_rs);
	$content .= '<ul>';
	for($i=0;$i<$limit_rs;$i++){
		if($i < $limit_rs - 1){$style_tool = 'style="margin-right:4px';}else{$style_tool = '';}
		$content .= '<li '.$style_tool.'"><img src="'.URL_PRODUCT_THUMB.$str[$i]['Image_Name'].'" width="147" height="118" />
				<span>'.$str[$i]['Product_Name'].'<br />'.$str[$i]['Product_Code'].'<br />
				<b style="font-size:14px; color:#F90">'.$str[$i]['Price'].' '.$str[$i]['Currency_Code'].'</b><br />
				<a href="'.URL_HOMEPAGE.'/product/view/'.$str[$i]['Category_ID'].'/'.$str[$i]['Product_ID'].'/view.html"  class="chitiet_btn">'._VIEWMORE.'</a></span></li>';
	}
	$content .= '</ul>';
	return $content;
?>