<?php
	global $db,$smarty,$function,$template,$numcart;
	$check_cart = $oProduct->check_cart($_SESSION['Shopping']);
	$content = '<span id="notificationsLoader"></span><div class="bg_c">';
	$content .= '<div id="contentWrapRight"><div id="basketWrap"><div id="basketTitleWrap"></div><div id="basketItemsWrap"><ul><li></li>';
		if($check_cart > 0){
			$cart = $oProduct->show_cart($_SESSION['Shopping']);
			for($i=0;$i < count($cart); $i++){
				$incart[$i]['Product_ID'] = $cart[$i]['Pro_ID'];
				$incart[$i]['ID'] = $cart[$i]['Shopping_ID'];
				$incart[$i]['Product_Name'] = $cart[$i]['Product_Name'];
				$incart[$i]['Product_Code'] = $cart[$i]['Product_Code'];
				$incart[$i]['Amount'] = $cart[$i]['Amount'];
				$incart[$i]['Currency_Code'] = $cart[$i]['Currency_Code'];
				$cart[$i]['Sale'] = str_replace(".","",$cart[$i]['Sale']);
				$cart[$i]['Price'] = str_replace(".","",$cart[$i]['Price']);
				if($cart[$i]['Sale'] > 0){
					$incart[$i]['Price'] = number_format($cart[$i]['Sale'], 0, '.', '.');
					$incart[$i]['Money'] = number_format($cart[$i]['Sale']*$cart[$i]['Amount'], 0, '.', '.');
				}else{
					$incart[$i]['Price'] = number_format($cart[$i]['Price'], 0, '.', '.');
					$incart[$i]['Money'] = number_format($cart[$i]['Price']*$cart[$i]['Amount'], 0, '.', '.');
				}
				$content_sub = $content_sub.'<li id="productID_' . $incart[$i]['Product_ID'] . '">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.URL_HOMEPAGE.'/basket_remove/' . $incart[$i]['Product_ID'] . '.html" onClick="return false;"><img src="'.URL_HOMEPAGE.'/templates/'.$template.'/images/delete.png" id="deleteProductID_' . $incart[$i]['Product_ID'] . '"></a>&nbsp;'.$incart[$i]['Product_Name'] . '(' . $incart[$i]['Amount'] . ')</li>';
			}			
		}
	$content .= $content_sub . '</ul></div></div></div></div>';	
	return $content;
?>


	
					