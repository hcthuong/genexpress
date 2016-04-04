<?php
	include("config.php");
	global $db,$smarty,$function, $namesite, $urlsite,$template;
	$smarty->assign("title", $sitename);
	$smarty->assign("template", $template);
	$module = isset($_GET['module']) ? $_GET['module'] : 'homepage';
	$smarty->assign("module",$module);
	$oCms = new CMS;
	$list_module = array();
    if(isset($_SESSION['logined_information']) AND $_SESSION['logined_information'] === true){
		if($_SESSION['logined_information_detail']['IsAdmin'] == 1){
			$list_module = $oCms->show_all_module();
		}else{
			$list_module = $oCms->show_all_module_admin($_SESSION['logined_information_detail']['Admin_ID']);
		}
	    $smarty->assign('list_module',$list_module);
	}
	for($i = 0; $i < count($list_module);$i++){
		$arr_r[] = ($list_module[$i]['Module_ID']);
	}
	switch($module){
	case 'homepage':
		if(isset($_SESSION['logined_information']) AND $_SESSION['logined_information'] === true){
			$smarty->assign('panel_module', homepage());
			$smarty->display('homepage.html');
		}else{
			$function->goto_url("?module=login");
		}
	break;
	case "ads":
		if(isset($_SESSION['logined_information']) AND $_SESSION['logined_information'] === true){
			include('../data/link_setting.php');
			$smarty->assign('panel_module', link_process_admin());
			$smarty->display('homepage.html');
		}else{
			$function->goto_url("?module=login");
		}
	break;	
	case "yahoo":
		if(isset($_SESSION['logined_information']) AND $_SESSION['logined_information'] === true){
			$smarty->assign('panel_module', yahoo_process_admin());
			$smarty->display('homepage.html');
		}else{
			$function->goto_url("?module=login");
		}
	break;
	case "news":
		if(isset($_SESSION['logined_information']) AND $_SESSION['logined_information'] === true){
			$smarty->assign('panel_module', news_process_admin());
			$smarty->display('homepage.html');
		}else{
			$function->goto_url("?module=login");
		}
	break;	
	case 'setting':
		if(isset($_SESSION['logined_information']) AND $_SESSION['logined_information'] === true){
			$smarty->assign("panel_module", setting_process_admin());
			$smarty->display("homepage.html");
                }else{
			$function->goto_url("?module=login");
		}
	break;
	case 'product':
		if(isset($_SESSION['logined_information']) AND $_SESSION['logined_information'] === true){
			$smarty->assign("panel_module", product_process_admin());
			$smarty->display("homepage.html");
                }else{
			$function->goto_url("?module=login");
		}
	break;	
	case 'cms':
		if(isset($_SESSION['logined_information']) AND $_SESSION['logined_information'] === true){
			$smarty->assign("panel_module", cms_process());
			$smarty->display("homepage.html");
		}else{
			$function->goto_url("?module=login");
		}
	break;
	case 'block':
		if(isset($_SESSION['logined_information']) AND $_SESSION['logined_information'] === true){
			$smarty->assign("panel_module", block_process_admin());
			$smarty->display("homepage.html");
		}else{
			$function->goto_url("?module=login");
		}
	break;

    case "module":
        if(isset($_SESSION['logined_information']) AND $_SESSION['logined_information'] === true){
            $smarty->assign("panel_module", module_process_admin());
            $smarty->display("homepage.html");
        }else{
            $function->goto_url("?module=login");
        }
        break;

    case "information":
        if(isset($_SESSION['logined_information']) AND $_SESSION['logined_information'] === true){
            $smarty->assign("panel_module", information_process_admin());
            $smarty->display("homepage.html");
        }else{
            $function->goto_url("?module=login");
        }
        break;

	case 'order_view_detail':
		if(isset($_SESSION['logined_information']) AND $_SESSION['logined_information'] === true){
			$oProduct = new Product();
			$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
			$rs = $oProduct->show_info_order($id);
			if(!$id){
				return $smarty->fetch("product/order_manager.html");
			}else{
				$order_detail = explode("|",$rs["Description"]);
				for($i = 1; $i < count($order_detail); $i++){
					$order_detail1[$i] = explode("_",$order_detail[$i]);}
				for($j = 1;$j <= count($order_detail1); $j++){
					$order_view_detail[$j]["Product_Name"] = $order_detail1[$j][0];
					$order_view_detail[$j]["Product_Code"] = $order_detail1[$j][1];
					$order_view_detail[$j]["Price"] = $order_detail1[$j][2];
					$order_view_detail[$j]["Amount"] = $order_detail1[$j][3];
					$order_view_detail[$j]["Money"] = $order_detail1[$j][4];
					$total_money = $total_money + (str_replace(".","",$order_detail1[$j][2])*$order_detail1[$j][3]);}
				$smarty->assign("total_money",number_format($total_money,0, '.', '.'));
				$smarty->assign("order_view_detail",$order_view_detail);
				$smarty->assign("panel_module", $rs);
				$smarty->display("product/order_view_detail.html");
			}
		}else{
			$function->goto_url("?module=login");
		}
	break;
	case 'comment_view':
		$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
		$oProduct = new Product();
		$comment_detail = $oProduct->show_comment($id);
		$smarty->assign('comment_detail',$comment_detail);
		$smarty->display("product/comment_view_detail.html");
	break;
	case 'login':
		default:
		if(isset($_POST["btn_submit"])){
			$username = preg_replace("/(<\/?)(\w+)([^>]*>)/e", "",addslashes($function->FixQuotes($_POST["username"])));
			$password = preg_replace("/(<\/?)(\w+)([^>]*>)/e", "",addslashes($function->FixQuotes($_POST["password"])));
			$oCms = new CMS;
			$check_user = $oCms->check_user($username);
			if($check_user == true){
				$_SESSION['logined_information_detail'] = $oCms->check_login($username,md5($password));
				if($_SESSION['logined_information_detail'] == true){
					$_SESSION["logined_information"]=true;
					$function->goto_url("index.php?module=homepage");
				}else{
					$_SESSION["logined_information"]=false;
					$smarty->assign("warning", "Mật khẩu không chính xác");
					$smarty->display("signin.html");
				}
			}else{
				$_SESSION["logined_information"]=false;
				$smarty->assign("warning", "Tên đăng nhập không tồn tại");
				$smarty->display("signin.html");
			}
		} else {
				$smarty->display('signin.html');
		}
		break;
	case "logout":
		unset($_SESSION['logined_information_detail']);
		unset($_SESSION['logined_information']);
		$function->goto_url("index.php?module=login");
		break;
	}
?>