<?php
	//@session_start();
	include("include/include.php");
	global $db, $smarty, $function, $sitename, $disable_site, $template,$hot_line;
		$module = isset($_GET['mod'])? $_GET['mod']:'home';
		$smarty->assign("module", $module);
		$oCms = new Cms;
		$module_info = $oCms->module_infomation($module);
		$oModuleID = $module_info['Module_ID'];
		if(!$oModuleID){ $oModuleID = 0;}
		$smarty->assign("title", $sitename);
		$smarty->assign("template", $template);
		
		// xu ly ngon ngu
		$lang = isset($_GET['language']) ? $_GET['language'] : "";
		if(isset($_SESSION['laguage'])){
			if($lang == "en"){
				$_SESSION['laguage'] = "language_en.php";
				require("language/".$_SESSION['laguage']."");	
			}elseif($lang == "vi"){
				$_SESSION['laguage'] = "language_vn.php";
				require("language/".$_SESSION['laguage']."");	
			}else{
				require("language/".$_SESSION['laguage']."");	
			}
		}else{
			$_SESSION['laguage'] = "language_vn.php";
			require("language/".$_SESSION['laguage']."");	
		}
		//---------------
		//Ket thuc the hien hinh anh header hoac top content
		
		$oProduct = new Product();
		
		//Menu Top
		$oCategory = new Category();
		$list = $oCategory->list_category();
		$smarty->assign("cat",$list);

        $oInfor = new Information();
        $list_incat = $oInfor->getAllInformationCategory();
        $smarty->assign("incat", $list_incat);
		//End Menu Top
		
		$_SESSION['Shopping'] = session_id();
		$oProduct->clear_shoping($_SESSION['Shopping']);
		$sl_in_cart = $oProduct->count_shoping($_SESSION['Shopping']);
		$smarty->assign("slincart", $sl_in_cart);
		if($disable_site ==1){
			$smarty->assign("panel_module", closesite());
			$smarty->display($template.'/homepage.html');}
		else{
			switch($module){
				case 'home':
				default:
					$smarty->assign("panel_module", homepageclient());
					$smarty->display($template.'/homepage.html');
				break;
				case 'contact':
					$smarty->assign("panel_module", contact_process_client());
					$smarty->display($template.'/homepage.html');
				break;
				case 'news':
					$smarty->assign("panel_module", news_process_client());
					$smarty->display($template.'/homepage.html');
				break;
				case 'product':
					$smarty->assign("panel_module", product_process_client());
					$smarty->display($template.'/homepage.html');
				break;
                case 'information':
                    $smarty->assign("panel_module", information_process_client());
                    $smarty->display($template.'/homepage.html');
                    break;
				case 'search':
					$smarty->assign("panel_module", search_process_client());
					$smarty->display($template.'/homepage.html');
				break;
				
			}
		}
?>
