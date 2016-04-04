<?php
function homepage(){
	global $db, $smarty, $function, $sitename,$language;
	$oCms = new CMS();
	$a = isset($_GET['a']) ? $_GET['a'] : "";
	$smarty->assign('ip_server', $_SERVER['SERVER_ADDR']);//Ip server
	$smarty->assign('ip', $_SERVER['REMOTE_ADDR']);
	$smarty->assign('domain', $_SERVER['SERVER_NAME']);
	$smarty->assign('path_site', URL_HOMEPAGE);
	$smarty->assign('path_physical', DIRECTORY_SITE);
	$smarty->assign('protocol', $_SERVER["SERVER_SIGNATURE"]);//giao thuc giua may chu va php
	$smarty->assign('os', php_uname('s'));//he dieu hanh may chu
	$smarty->assign('apache_version', $_SERVER["SERVER_SOFTWARE"]);
	$smarty->assign('sitename',$sitename);
	$smarty->assign('numadmin',$oCms->get_nums_admin());
	return $smarty->fetch("welcome.html");
}
// Client
function homepageclient(){
	global $smarty, $function,$template;
	
	$oProduct = new Product();
	$all_product = $oProduct->show_all_product_for_carousel();
	//print_r($all_product);exit;
	$hot_product = $oProduct->show_all_product_hot();
	$smarty->assign("products", $all_product);
	$smarty->assign("hot_product", $hot_product);
	return $smarty->fetch($template."/index.html");
}
function closesite(){
	global $db, $smarty, $function, $disable_message;
	$smarty->assign("disable_message",$disable_message);
	return $smarty->fetch("close_site.html");
}
?>