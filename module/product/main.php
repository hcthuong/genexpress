<?php
function product_process_admin(){
	global $db, $smarty, $function,$module,$arr_r;
	$oProduct = new Product;
	$oCategory = new Category;
    $oInfor = new Information();
	$oCms = new Cms;
	$a = isset($_GET['a']) ? $_GET['a'] : "";
	$module_info = $oCms->module_infomation($module);
	$oModuleID = $module_info['Module_ID'];
	if(!in_array($oModuleID,$arr_r)){
		return $function->msg_box("Bạn không được phép truy cập chức năng này!!!",2,"?module=homepage");}
	switch(strtolower($a)){
//Bat dau chuc nang danh muc dich vu
		case "product_category_manager":
			$rs = $oCategory->show_all_parent_category(1,$module,'Category_Name','asc',0,0);
			for($i=0;$i<count($rs);$i++){ $sub[$i] = $oCategory->show_all_product_sub_category($module,$rs[$i]['Category_ID'],'Category_Name','asc');}
			$smarty->assign("sub",$sub);
			$smarty->assign("rs", $rs);
			return $smarty->fetch("product/product_category_manager.html");
		break;
		case "product_category_add":
			if($_POST['submit']){
				$category_name = stripslashes($function->FixQuotes($_POST['category_name']));
				$category_name_en = stripslashes($function->FixQuotes($_POST['category_name_en']));
				$parent_category = intval($_POST['cat']);
                $information_productcat = intval($_POST['infor_prodcat']);
				if($category_name == ''){return $function->msg_box("Vui lòng nhập tên danh mục!<br /><a href='?module=product&a=product_add'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=product&a=product_add",3);}
				$oCategory->category_add($module,$category_name,$category_name_en,$parent_category, $information_productcat,1);
				$oCms->add_diary($oModuleID,$_SESSION['logined_detail']['Admin_ID'],"Thêm danh mục sản phẩm.");
				return $function->msg_box("Danh mục sản phẩm đã được thêm!<br /><a href='?module=product&a=product_category_manager'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=product&a=product_category_manager",1);
			}else{
				$list_category_parent = $oCategory->show_all_product_category($module,'Category_Name','asc');
                $information_cat = $oInfor->getAllInformationCategory();
				$smarty->assign('list_category_parent',$list_category_parent);
                $smarty->assign('list_infor_cat', $information_cat);
				return $smarty->fetch("product/product_category_add.html");
			}
		break;
		case "product_category_edit":
			$category_id = isset($_GET['catid']) ? intval($_GET['catid']) : 0;
			$show_category = $oCategory->show_category(0,$module,$category_id);
			if($_POST['submit']){
				$category_name = stripslashes($function->FixQuotes($_POST['category_name']));
				$category_name_en = stripslashes($function->FixQuotes($_POST['category_name_en']));
				$parent_category = intval($_POST['cat']);
                $information_productcat = intval($_POST['infor_prodcat']);
				if($category_name == ''){return $function->msg_box("Vui lòng nhập tên danh mục!<br /><a href='?module=product&a=product_category_edit&catid='".$category_id.">(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=product&a=product_category_edit&catid=".$category_id,3);}
				$check_subcat = $oCategory->check_subcat($module,$category_id);
				if($parent_category > 0 and $check_subcat > 0){
					return $function->msg_box("Việc thay đổi cấp của danh mục ".$category_name." có thể làm ảnh hưởng đến các danh mục con của ".$category_name.".<br /><a href='?module=product&a=product_category_edit&catid=$category_id'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=product&a=product_category_edit&catid=".$category_id,2);}
				$oCategory->category_edit($category_id,$module,$category_name,$category_name_en,$parent_category, $information_productcat,1);
				$oCms->add_diary($oModuleID,$_SESSION['logined_detail']['Admin_ID'],"Cập nhật thông tin danh mục sản phẩm.");
				return $function->msg_box("Thông tin danh mục đã được cập nhật!<br /><a href='?module=product&a=product_category_manager'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=product&a=product_category_manager",1);
			}else{
				$list_category_parent = $oCategory->category_list(1,$module,$category_id,'Category_Name','asc');
                $information_cat = $oInfor->getAllInformationCategory();
				$smarty->assign('list_category_parent',$list_category_parent);
				$smarty->assign('show_category',$show_category);
                $smarty->assign('list_infor_cat', $information_cat);
				return $smarty->fetch("product/product_category_edit.html");
			}
		case "product_category_delete":
			$category_id = isset($_GET['catid']) ? intval($_GET['catid']) : 0;
			$check_subcat = $oCategory->check_subcat($module,$category_id);
			$check_category = $oCategory->check_category($module,$category_id);
			if($check_subcat > 0){
				return $function->msg_box("Vui lòng xóa hết danh mục con thuộc danh mục này trước khi xóa nó!<br /><a href='?module=product&a=product_category_manager'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=product&a=product_category_manager",2);}
			if($check_category > 0){
				return $function->msg_box("Vui lòng xóa hết sản phẩm thuộc danh mục này trước khi xóa nó!<br /><a href='?module=product&a=product_category_manager'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=product&a=product_category_manager",2);}
			$oCategory->category_delete($module,$category_id);
			$oCms->add_diary($oModuleID,$_SESSION['logined_detail']['Admin_ID'],"Xóa danh mục mục sản phẩm.");
			return $function->msg_box("Hệ thống đã xóa danh mục sản phẩm!<br /><a href='?module=product&a=product_category_manager'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",2,"?module=product&a=product_category_manager",1);
		break;
//ket thuc chuc nang danh muc dich vu
		case "product_manager":
		default:
			$category_id = isset($_GET['catid']) ? intval($_GET['catid']) : 0;
			$smarty->assign('category_id',$category_id);
			$rs = $oCategory->show_all_parent_category(1,$module,'Category_Name','asc',0,0);
			for($i=0;$i<count($rs);$i++){ $sub[$i] = $oCategory->show_all_product_sub_category($module,$rs[$i]['Category_ID'],'Category_Name','asc');}
			$smarty->assign("sub",$sub);
			$smarty->assign("rs", $rs);
			$smarty->assign("resize_width",50);
			$numf = $oProduct->get_nums_product($categtory_id);
			$all_page = $numf ? $numf : 1; 
			$page = isset($_GET['page']) ? intval($_GET['page']) : 0;
			$base_url = "?module=product&a=product_manager";
			if($category_id > 0){ $base_url .= "&catid=$category_id";}
			$paging = $function->generate_page($base_url, $all_page, 20, $page);
			$product_list = $oProduct->show_all_product($category_id,'Product_ID','desc',$page, 20);
			$smarty->assign("paging", $paging);
			$smarty->assign("product_list", $product_list);
			return $smarty->fetch("product/product_manager.html");
		break;

		case "product_add":
			global $max_size,$files_mime,$extension;
			$rs = $oCategory->show_all_parent_category(1,$module,'Category_Name','asc',0,0);
			for($i=0;$i<count($rs);$i++){ 
				$sub[$i] = $oCategory->show_all_product_sub_category($module,$rs[$i]['Category_ID'],'Category_Name','asc');
				if($sub[$i]){
					$rs[$i]['Type'] = 1;
				}else{
					$rs[$i]['Type'] = 0;
				}
			}
			$smarty->assign("sub",$sub);
			$smarty->assign("rs", $rs);
			if($_POST['submit']){
				$temp_name = str_replace("'", "’", $_POST['product_name_en']);
				$product_name = stripslashes($function->FixQuotes($_POST['product_name']));
				$product_name_en = stripslashes($function->FixQuotes($temp_name));
				$product_code = stripslashes($function->FixQuotes($_POST['product_code']));
				$product_category = intval($_POST['product_category']);
				$description = stripslashes($function->FixQuotes($_POST['description']));
				$description_en = stripslashes($function->FixQuotes($_POST['description_en']));
				$product_price = stripslashes($function->FixQuotes($_POST['product_price']));
				$product_price_en = stripslashes($function->FixQuotes($_POST['product_price_en']));
				$_SESSION['data']['product_name'] = $product_name;
				$_SESSION['data']['product_name_en'] = $product_name_en;
				$_SESSION['data']['product_name_search'] = $function->to_character($product_name);
				$_SESSION['data']['product_code'] =  $product_code;
				$_SESSION['data']['product_category'] = $product_category;
				$_SESSION['data']['description'] = $description;
				$_SESSION['data']['description_en'] = $description_en;
				$_SESSION['data']['product_price'] = $product_price;
				$_SESSION['data']['product_price_en'] = $product_price_en;
				if($product_name == "" or $product_category == 0){
					return $function->msg_box("Bạn chưa nhập đầy đủ các thông tin yêu cầu. Vui lòng kiểm tra lại!<br /><a href='?module=product&a=product_add'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=product&a=product_add",3);
				}else{
					if(isset($_FILES['filename']) && !empty($_FILES['filename']['tmp_name'])){
						$file_name = $_FILES['filename']['name'];
						$file_size = $_FILES['filename']['size'];
						$file_type = $_FILES['filename']['type'];
						$files_mime = explode(",",$files_mime);
						$extension = explode(",",$extension);
						$files_extension = end(explode(".",$file_name));
						$files_extension = strtolower($files_extension);
						if ($file_size > $max_size){
							return $function->msg_box("Không thể upload tập tin. Kích thước tập tin lớn hơn " . $max_size . " byte.<br /><a href='?module=product&a=product_add'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=product&a=product_add",3);}
						if(!in_array($files_extension,$extension) || !in_array($file_type,$files_mime)){
							return $function->msg_box("Loại tập tin hoặc phần mở rộng của tập tin không được phép thêm.<br /><a href='?module=product&a=product_add'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=product&a=product_add",3);}
						$real_name = $function->chars_rand(3).$_FILES['filename']['name'];
						include(DIRECTORY_SITE."/class/resize.class.php");
						$resize_large = new resize("filename", 600);
						$resize_large->saveTo($real_name, IMG_PRODUCT);
						include(DIRECTORY_SITE."/class/SmartImage.class.php");
						$resizeObj = new SmartImage(IMG_PRODUCT.$real_name);
						$resizeObj -> resize(200,230,true);
						$resizeObj -> saveImage(IMG_PRODUCT_THUMB.$real_name);
					}
					$oProduct->add_product($_SESSION['data'],$real_name);
					$oCms->add_diary($oModuleID,$_SESSION['logined_detail']['Admin_ID'],"Thêm sản phẩm.");
					unset($_SESSION['data']);
					return $function->msg_box("Sản phẩm đã được thêm!<br /><a href='?module=product'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=product",1);
				}
			}else{
				$sBasePath = "../CKEditor/";
				$CKEditor = new CKEditor();
				$CKEditor->returnOutput = true;
				$CKEditor->basePath = $sBasePath;
				$CKEditor->config['width'] = 600;
				$CKEditor->config['filebrowserBrowseUrl'] = $sBasePath.'ckfinder/browse.php';
				$CKEditor->config['filebrowserImageBrowseUrl'] = $sBasePath.'ckfinder/browse.php?type=Images';
				$CKEditor->config['filebrowserFlashBrowseUrl'] = $sBasePath.'ckfinder/browse.php?type=Flash';
				$CKEditor->config['filebrowserUploadUrl'] = $sBasePath.'ckfinder/upload.php';
				$CKEditor->config['filebrowserImageUploadUrl'] = $sBasePath.'ckfinder/upload.php?type=Images';
				$CKEditor->config['filebrowserFlashUploadUrl'] = $sBasePath.'ckfinder/browse.php?type=Flash';
				$initialValue = $_SESSION['data']['description'];
				$initialValue_en = $_SESSION['data']['description_en'];
				$description = $CKEditor->editor("description", $initialValue);
				$description_en = $CKEditor->editor("description_en", $initialValue_en);
				$smarty->assign("description", $description);
				$smarty->assign("description_en", $description_en);
				return $smarty->fetch("product/product_add.html");
			}
		break;

		case "product_edit":
			global $max_size,$files_mime,$extension;
			$rs = $oCategory->show_all_parent_category(1,$module,'Category_Name','asc',0,0);
			for($i=0;$i<count($rs);$i++){ $sub[$i] = $oCategory->show_all_product_sub_category($module,$rs[$i]['Category_ID'],'Category_Name','asc');}
			$smarty->assign("sub",$sub);
			$smarty->assign("rs", $rs);
			$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
			$product = $oProduct->show_product($id);
			$smarty->assign("product", $product);
			if($_POST['submit']){
				$temp_name = str_replace("'", "’", $_POST['product_name_en']);
				$product_name = stripslashes($function->FixQuotes($_POST['product_name']));
				$product_name_en = stripslashes($function->FixQuotes($temp_name));
				$product_code = stripslashes($function->FixQuotes($_POST['product_code']));
				$product_category = intval($_POST['product_category']);
				$description = stripslashes($function->FixQuotes($_POST['description']));
				$description_en = stripslashes($function->FixQuotes($_POST['description_en']));
				$product_price = stripslashes($function->FixQuotes($_POST['product_price']));
				$product_price_en = stripslashes($function->FixQuotes($_POST['product_price_en']));
				$data['product_name'] = $product_name;
				$data['product_name_en'] = $product_name_en;
				$data['product_name_search'] = $function->to_character($product_name);
				$data['product_code'] =  $product_code;
				$data['product_category'] = $product_category;
				$data['description'] = $description;
				$data['description_en'] = $description_en;
				$data['product_price'] = $product_price;
				$data['product_price_en'] = $product_price_en;
				$dcheck = intval($_POST['del_image']);
				if($product_name == "" or $product_category == 0){
				return $function->msg_box("Có lỗi trong quá trình thay đổi thông tin. Vui lòng thử lại!<br /><a href='?module=product&a=product_edit&id=$id'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=product&a=product_edit&id=".$id,3);
				}else{
					if(isset($_FILES['filename']) && !empty($_FILES['filename']['tmp_name'])){
						$file_name = $_FILES['filename']['name'];
						$file_size = $_FILES['filename']['size'];
						$file_type = $_FILES['filename']['type'];
						$files_mime = explode(",",$files_mime);
						$extension = explode(",",$extension);
						$files_extension = end(explode(".",$file_name));
						$files_extension = strtolower($files_extension);
						if ( $file_size > $max_size ){
							return $function->msg_box("Không thể upload tập tin. Kích thước hình lớn hơn " . $max_size ." byte.<br /><a href='?module=product&a=product_edit&id=$id'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=product&a=product_edit&id=".$id,2);}
						if(!in_array($files_extension,$extension) || !in_array($file_type,$files_mime)){
							return $function->msg_box("Loại tập tin hoặc phần mở rộng của tập tin không được phép thêm.<br /><a href='?module=product&a=product_edit&id=$id'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=product&a=product_edit&id=".$id,2);}
						$real_name = $function->chars_rand(3).$_FILES['filename']['name'];
						include(DIRECTORY_SITE."/class/resize.class.php");
						$resize_large = new resize("filename", 600);
						$resize_large->saveTo($real_name, IMG_PRODUCT);
						include(DIRECTORY_SITE."/class/SmartImage.class.php");
						$resizeObj = new SmartImage(IMG_PRODUCT.$real_name);
						$resizeObj -> resize(200,230,true);
						$resizeObj -> saveImage(IMG_PRODUCT_THUMB.$real_name);
						if($product['Image_Name'] != ''){
							unlink(IMG_PRODUCT.$product['Image_Name']);
							unlink(IMG_PRODUCT_THUMB.$product['Image_Name']);}
					}else{
						if($product['Image_Name'] != ''){
							if($dcheck == 1){
								unlink(IMG_PRODUCT.$product['Image_Name']);
								unlink(IMG_PRODUCT_THUMB.$product['Image_Name']);
								$real_name = '';
							}else{
								$real_name = $product['Image_Name'];
							}
						}else{
							$real_name = '';
						}
					}
				}
				$oProduct->edit_product($id,$data,$real_name);
				$oCms->add_diary($oModuleID,$_SESSION['logined_detail']['Admin_ID'],"Cập nhật thông tin sản phẩm.");
				return $function->msg_box("Đã cập nhật thông tin sản phẩm!<br /><a href='?module=product'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=product&a=product_manager",1);
			}else{
				$sBasePath = "../CKEditor/";
				$CKEditor = new CKEditor();
				$CKEditor->returnOutput = true;
				$CKEditor->basePath = $sBasePath;
				$CKEditor->config['width'] = 600;
				$CKEditor->config['filebrowserBrowseUrl'] = $sBasePath.'ckfinder/browse.php';
				$CKEditor->config['filebrowserImageBrowseUrl'] = $sBasePath.'ckfinder/browse.php?type=Images';
				$CKEditor->config['filebrowserFlashBrowseUrl'] = $sBasePath.'ckfinder/browse.php?type=Flash';
				$CKEditor->config['filebrowserUploadUrl'] = $sBasePath.'ckfinder/upload.php';
				$CKEditor->config['filebrowserImageUploadUrl'] = $sBasePath.'ckfinder/upload.php?type=Images';
				$CKEditor->config['filebrowserFlashUploadUrl '] = $sBasePath.'ckfinder/browse.php?type=Flash';
				$initialValue = $product['Description'];
				$initialValue_en = $product['Description_EN'];
				$description = $CKEditor->editor("description", $initialValue);
				$description_en = $CKEditor->editor("description_en", $initialValue_en);
				$smarty->assign("description", $description);
				$smarty->assign("description_en", $description_en);
				return $smarty->fetch("product/product_edit.html");
			}
		break;

		case "product_delete":
			$check = $_POST['product_del'];
			if($check != null){
				foreach($check as $id){
					$id= intval($id);
					$product = $oProduct->show_product($id);
					if($product['Image_Name'] !=''){
					unlink(IMG_PRODUCT.$product['Image_Name']);
					unlink(IMG_PRODUCT_THUMB.$product['Image_Name']);}
					$oProduct->del_product($id);
					$oCms->add_diary($oModuleID,$_SESSION['logined_detail']['Admin_ID'],"Xóa sản phẩm.");
				}
			}
			return $function->msg_box("Đã xóa sản phẩm!<br /><a href='?module=product'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=product&a=product_manager",1);
		break;

		case "update_hot":
			$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
			$hot = isset($_GET['hot']) ? intval($_GET['hot']) : 0;
			if($hot == 0){$oProduct->update_hot($id,1);
			}else{$oProduct->update_hot($id,0);}
			$oCms->add_diary($oModuleID,$_SESSION['logined_detail']['Admin_ID'],"Cập nhật trạng thái sản phẩm.");
			return $function->msg_box("Đã cập nhật trạng thái sản phẩm!!<br /><a href='?module=product'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=product&a=product_manager",1);
		break;
		
		case "update_status":
			$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
			$status = isset($_GET['status']) ? intval($_GET['status']) : 0;
			if($status == 0){$oProduct->update_status($id,1);
			}else{$oProduct->update_status($id,0);}
			$oCms->add_diary($oModuleID,$_SESSION['logined_detail']['Admin_ID'],"Cập nhật trạng thái hiển thị sản phẩm.");
			return $function->msg_box("Đã cập nhật trạng thái hiển thị sản phẩm!<br /><a href='?module=product'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=product&a=product_manager",1);
		break;
		case "order_list":
			global $per_page;
			$numf = $oProduct->get_nums_order();
			$all_page = $numf ? $numf : 1; 
			$page = isset($_GET['page']) ? intval($_GET['page']) : 0;
			$base_url = "?module=product&a=order_list";
			$paging = $function->generate_page($base_url, $all_page, 20, $page);
			$rs = $oProduct->show_all_order_page($page, 20);
			$smarty->assign("rs",$rs);
			$smarty->assign("paging", $paging);
			return $smarty->fetch("product/order_list.html");
		break;
		case "process_order":
			$order_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
			$status = isset($_GET['status']) ? intval($_GET['status']) : 0;
			if($order_id == 0){
				return $function->msg_box("Đơn hàng không tồn tại!<br /><a href='?module=product&a=order_list'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=product&a=order_list",2);
			}else{
				$oProduct->process_order($order_id, $status);
				$oCms->add_diary($oModuleID,$_SESSION['logined_detail']['Admin_ID'],"Xử lý đơn hàng.");
				if($status == 1){
					$rs = $oProduct->show_info_order($order_id);
					$order_detail = explode("|",$rs["Description"]);
					for($i = 1; $i < count($order_detail); $i++){
						$order_detail1[$i] = explode("_",$order_detail[$i]);}
					for($j = 1;$j <= count($order_detail1); $j++){
						$order_view_detail[$j]["Product_Name"] = $order_detail1[$j][0];
						$order_view_detail[$j]["Product_Code"] = $order_detail1[$j][1];
						$order_view_detail[$j]["Price"] = $order_detail1[$j][2];
						$order_view_detail[$j]["Amount"] = $order_detail1[$j][3];
						$order_view_detail[$j]["Money"] = $order_detail1[$j][4];
						$total_money = $total_money + (str_replace(".","",$order_detail1[$j][2])*$order_detail1[$j][3]);
					}
					$total_money = number_format($total_money,0, '.', '.');
					include('../class/smtp.php');
					$subject = "Xác nhận đơn đặt hàng";
					$content = '<table width="800" cellpadding="0" cellspacing="0" align="center">
						<tr><td colspan="4"><b>Thông tin chi tiết đặt hàng</b></td></tr>
						<tr><td><b>Họ & Tên:</b></td><td>'.$rs["Full_Name"].'</td>
						<td><b>Điện thoại:</b></td>
						<td>'.$rs["Phone"].'</td></tr>
						<tr><td colspan="3"><b>Email:</td><td>'.$rs["Email"].'</td>
						<tr><td><b>Ngày đặt hàng:</td><td>'.$rs["Create_Date_Change"].'</td>
						<td><b>Ngày xử lý:</b></td><td>'.$rs["Update_Date_Change"].'</td></tr>
						<tr><td><b>Người xử lý:</td><td>'.$client_name.'</td>
						<td><b>Trạng thái:</b></td><td>Đã xác nhận</td></tr>
						<tr><td><b>Yêu cầu khác:</b></td><td colspan="3">'.$rs["Requirements"].'</td></tr>
						</table><br />
						<table width="800" align="center" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="3" style="border-collapse:collapse;">
						<tr style="background-color:#ebebeb;font-weight:bold;">
						<td>Tên sản phẩm</td><td>Mã sản phẩm</td><td>Giá</td><td>Số lượng</td><td>Thành tiền</td></tr>';
						for($k=1;$k <= count($order_view_detail);$k++){
							$content .='<tr><td>'.$order_view_detail[$k]["Product_Name"].'</td>
								<td align="right">'.$order_view_detail[$k]["Product_Code"].'</td>
								<td align="right">'.$order_view_detail[$k]["Price"].' VND</td>
								<td align="right">'.$order_view_detail[$k]["Amount"].'</td>
								<td align="right">'.$order_view_detail[$k]["Money"].' VND</td></tr>';}
							$content .= '<tr><td colspan="3" align="right">Tổng tiền:</td><td align="right">'.$total_money.' VND</td></tr>
								</table><br /><center>Cám ơn bạn đã đặt hàng';
						if(SendMail($_SESSION["logined_detail"]["Email"], $rs["Email"], $subject, $content,$_SESSION["logined_detail"]["Admin_Name"])){
							return $function->msg_box("Đã xác nhận đơn hàng!!!",2,"?module=product&a=order_list");
						}
				}elseif($status == 2){
					return $function->msg_box("Đơn hàng đã được xử lý!<br /><a href='?module=product&a=order_list'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=product&a=order_list",1);
				}elseif($status == 3){
					return $function->msg_box("Đơn hàng đã bị hủy!<br /><a href='?module=product&a=order_list'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=product&a=order_list",1);
				}
			}
		break;
		case "delete_order":
			$check = $_POST['order_del'];
			if($check != null){
				foreach($check as $id){
					$order_id = intval($id);
					$oProduct->delete_order($order_id);}
			}
			return $function->msg_box("Đơn hàng đã được xóa!<br /><a href='?module=product&a=order_list'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=product&a=order_list",1);
		break;
		case "product_comment":
			$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
			$product = $oProduct->show_product($id);
			$smarty->assign("product", $product);
			$numf = $oProduct->get_nums_comment_page($id);
			$all_page = $numf ? $numf : 1; 
			$page = isset($_GET['page']) ? intval($_GET['page']) : 0;
			$base_url = "?module=product&a=product_view";
			$paging = $function->generate_page($base_url, $all_page, 20, $page);
			$comment_list = $oProduct->show_all_comment($id,$page, 20);
			$smarty->assign("paging", $paging);
			$smarty->assign("comment_list", $comment_list);
			return $smarty->fetch("product/product_view.html");
		break;
		case "comment_delete":
			$check = $_POST['comment_del'];
			$productid = intval($_POST['porduct_id']);
			if($check != null){
				foreach($check as $id){
					$id= intval($id);					
					$oProduct->del_comment($id);
					$oCms->add_diary($oModuleID,$_SESSION['logined_detail']['Admin_ID'],"Xóa nhận xét sản phẩm.");
				}
			}
			return $function->msg_box("Đã xóa nhận xét về sản phẩm!<br /><a href='?module=product&a=product_view&id=".$productid."'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=product&a=product_view&id=".$productid,1);
		break;
	}
}
function product_process_client(){
	global $db, $smarty, $function,$template,$module;
	$oProduct = new Product;
	$oCategory = new Category;
    $oInfor = new Information();
	$a = isset($_GET['a']) ? $_GET['a'] : "home";
	$smarty->assign("module_title",_PRODUCT);
	switch(strtolower($a)){
		case "home":
		default:
			$_SESSION['url'] = $_SERVER['QUERY_STRING'];
			$numf = $oProduct->get_nums_product_client(0);
			$all_page = $numf ? $numf : 1; 
			$page = isset($_GET['page']) ? intval($_GET['page']) : 0;
			$base_url = URL_HOMEPAGE."/product/home";
			$paging = $function->generate_page_client($base_url, $all_page, 15, $page);
			$product_list = $oProduct->show_all_product_client(0,'Product_ID','desc',$page,15);
			$smarty->assign("paging", $paging);
			$smarty->assign("product_list", $product_list);
			return $smarty->fetch($template."/product/index.html");
		break;
		
		case "cat":
			$_SESSION['url'] = $_SERVER['QUERY_STRING'];
			$catid = isset($_GET['catid']) ? intval($_GET['catid']) : 0;
			$cat_name = $oProduct->get_cat_name($catid);
			$page = isset($_GET['page']) ? intval($_GET['page']) : 0;
			$perpage = 3;
			$numf = $oProduct->get_nums_all_product_in_cat($catid);
			$all_page = $numf ? $numf : 1;
			$base_url = URL_HOMEPAGE."/product/catpage/".$catid;
			$prod_cat = $oProduct->get_all_products_in_cat($catid, $page, $perpage);
            for($i=0; $i < count($prod_cat); $i++) {
                $prod_cat[$i]['Price'] = number_format(str_replace(".","",$prod_cat[$i]['Price']), 0, '.', '.');
            }
			$paging = $function->generate_page($base_url, $all_page, $perpage, $page);
            // --- begin Get Information which belongs to this category, show img, summaru, view more....
            $infor_detail = $oInfor->getOneInformationLastestInCat($cat_name['Information_ProductCat']);
            $smarty->assign("infor_detail", $infor_detail);
            // --- end
			$smarty->assign("cat_title", $cat_name);
			$smarty->assign("prod_cat", $prod_cat);
			$smarty->assign("paging", $paging);
			return $smarty->fetch($template."/product/cat.html");
		break;
		
		case "detail":
			$_SESSION['url'] = $_SERVER['QUERY_STRING'];
			$pid = isset($_GET['pid']) ? intval($_GET['pid']) : 0;
			$detail = $oProduct->get_product_detail($pid);
			$detail['Price'] = number_format(str_replace(".","",$detail['Price']), 0, '.', '.');
			$smarty->assign("detail", $detail);
			return $smarty->fetch($template."/product/product_detail.html");
		break;
		
		case "view":
			$_SESSION['url'] = $_SERVER['QUERY_STRING'];
			$url = str_replace("mod=","",$_SESSION['url']);
			$url = str_replace("&a=","/",$url);
			$url = str_replace("&catid=","/",$url);
			$url = str_replace("&id=","/",$url);
			$url = str_replace("&str=","/",$url);
			if($url==""){ $url = 'home';}
			$url = $url.".html";
			$catid = isset($_GET['catid']) ? intval($_GET['catid']) : 0;
			$id = isset($_GET['catid']) ? intval($_GET['id']) : 0;
			$cat_info = $oCategory->show_category(1,'product',$catid);
			$smarty->assign("cat_info",$cat_info);
			$like = $oProduct->get_nums_comment($id,1);
			$smarty->assign("like",intval($like));
			$unlike = $oProduct->get_nums_comment($id,2);
			$smarty->assign("unlike",intval($unlike));
			$info = $oProduct->show_product($id);
			$smarty->assign("info",$info);
			if($_POST['submit']) {
				$client_name = $function->FixQuotes($_POST['fullname']);
				$client_mail = $function->FixQuotes($_POST['email']);
				$comment_status = intval($_POST['comment_status']);
				$description = $function->FixQuotes($_POST['description']);
					if($client_name == "" or $client_mail == "" or $description == ""){
						return $function->msg_box_client($template,_ERR_SEND_INVALID,2, URL_HOMEPAGE."/product/view/".$catid."/".$id."/view.html");}
					if($_POST['txt_verify_register'] != $_SESSION["code_verify"]){
					return $function->msg_box_client($template,_ERR_VERIFY_DIFF,2, URL_HOMEPAGE."/product/view/".$catid."/".$id."/view.html");}
					unset($_SESSION["code_verify"]);
					$oProduct->add_comment($id,$client_name,$client_mail,$description,$comment_status);
					return $function->msg_box_client($template,_MESS_SUCCESS_COMMENT,3, URL_HOMEPAGE.'/'.$url);
			}else{
				$chars_rand = explode("/",$function->chars_rand(6));
				$_SESSION["code_verify"] = $chars_rand[0];
			}
			$numf = $oProduct->get_nums_comment_page($id);
			$all_page = $numf ? $numf : 1; 
			$page = isset($_GET['page']) ? intval($_GET['page']) : 0;
			$base_url = URL_HOMEPAGE."/product/viewpage/".$catid."/".$id;
			$paging = $function->generate_page_client($base_url, $all_page, 1, $page);
			$comment_list = $oProduct->show_all_comment($id,$page,1);
			$smarty->assign("paging", $paging);
			$smarty->assign("comment_list", $comment_list);
			return $smarty->fetch($template."/product/view.html");
		break;
		case "comment":
			$url = str_replace("mod=","",$_SESSION['url']);
			$url = str_replace("&a=","/",$url);
			$url = str_replace("&catid=","/",$url);
			$url = str_replace("&id=","/",$url);
			$url = str_replace("&str=","/",$url);
			if($url==""){ $url = 'home';}
			$url = $url.".html";
			$id = isset($_GET['catid']) ? intval($_GET['id']) : 0;			
			$catid = isset($_GET['catid']) ? intval($_GET['catid']) : 0;
			$comment_status = isset($_GET['status']) ? intval($_GET['status']) : 0;
			$client_name = '';
			$client_mail = '';
			$oProduct->add_comment($id,$client_name,$client_mail,$description,$comment_status);
			return $function->goto_url(URL_HOMEPAGE.'/'.$url);
		break;
		case "search":
			if($_POST['slt_price'] > 0){
				$slt_price = $_POST['slt_price'];
				$_SESSION['slt_price'] = $slt_price;
			}else{
			$slt_price = $_SESSION['slt_price'];}
			if(intval($_POST['slt_category']) > 0){
				$slt_category = intval($_POST['slt_category']);
				$_SESSION['slt_category'] = $slt_category;
			}else{
			$slt_category = $_SESSION['slt_category'];}
			if($slt_category > 0){
				$cat_info = $oCategory->show_category(1,'product',$catid);
				$smarty->assign("cat_info",$cat_info);
			}else{
				$smarty->assign("cat_info",0);
			}
			$_SESSION['url'] = $_SERVER['QUERY_STRING'];
			$numf = $oProduct->get_nums_product_search($slt_price,$slt_category);
			$all_page = $numf ? $numf : 1;
			$page = isset($_GET['page']) ? intval($_GET['page']) : 0;
			$base_url = URL_HOMEPAGE."/product/searchpage";
			$paging = $function->generate_page_client($base_url, $all_page, 15, $page);
			$product_list = $oProduct->show_all_product_search($slt_price,$slt_category,'Product_ID','asc',$page,15);
			$smarty->assign("slt_price",$slt_price);
			$smarty->assign("paging", $paging);
			$smarty->assign("numf",$numf);
			$smarty->assign("product_list", $product_list);
			return $smarty->fetch($template."/product/result.html");
		break;
//Phan shopping------
		case 'basket':
			/*$productid = isset($_GET['id']) ? intval($_GET['id']) : 0;
			if(!$oProduct->show_product($productid)){
				return $function->msg_box_client($template,_ERR_CART,1,URL_HOMEPAGE);
			}
			$num = $oProduct->check_product_in_cart($_SESSION['Shopping'],$productid);
			if($num > 0){$oProduct->update_product_in_cart($_SESSION['Shopping'],$productid);
			}else{$oProduct->add_product_in_cart($_SESSION['Shopping'],$productid);}
			$url = str_replace("mod=","",$_SESSION['url']);
			$url = str_replace("&a=","/",$url);
			$url = str_replace("&catid=","/",$url);
			$url = str_replace("&id=","/",$url);
			$url = str_replace("&str=","/",$url);
			$url = str_replace("&page=","/",$url);
			if($url==""){ $url = 'home';}
			$url = $url.".html";
			$content .= '<link href="'.URL_HOMEPAGE.'/css/examples.css" rel="stylesheet" type="text/css">';
			$content .= '<script type="text/javascript" src="'.URL_HOMEPAGE.'/jscripts/jquery-impromptu.1.5.js"></script>';
			$content .= '<script type="text/javascript" charset="utf-8">
						    $.prompt("'._ADD_CART.'",{buttons:{"'._GO_CART.'":"'.URL_HOMEPAGE.'/product/cart.html","'._CONTINUE.'":"'.URL_HOMEPAGE.'/product.html"},
							callback:function(buttonVal) {
						        window.location.href = buttonVal;
						    }});
			</script>';return $content;*/
			//return $function->msg_box_client($template,_ADD_CART,1,URL_HOMEPAGE."/".$url);
			//return $function->goto_url("index.php?".$_SESSION['url']);
			$productid = isset($_GET['id']) ? intval($_GET['id']) : 0;
			$quantity = isset($_GET['qty']) ? intval($_GET['qty']) : 0;
			$catid = isset($_GET['catid']) ? intval($_GET['catid']) : 0;
			if(!$oProduct->show_product($productid)){
				return $function->msg_box_client($template,_ERR_CART,1,URL_HOMEPAGE);
			}
			if($quantity == 0) {
				return $function->msg_box_client($template,_ERR_CART,1,URL_HOMEPAGE);
			}
			$num = $oProduct->check_product_in_cart($_SESSION['Shopping'],$productid);
			if($num > 0){$oProduct->update_product_in_cart($_SESSION['Shopping'],$productid, $quantity);
			}else{$oProduct->add_product_in_cart($_SESSION['Shopping'],$productid, $quantity);}
			$url = str_replace("mod=","",$_SESSION['url']);
			$url = str_replace("&a=","/",$url);
			$url = str_replace("&catid=","/",$url);
			$url = str_replace("&id=","/",$url);
			$url = str_replace("&str=","/",$url);
			$url = str_replace("&page=","/",$url);
			if($url==""){ $url = 'home';}
			$url = $url.".html";
            $content = "";
			if($catid != 0) {
				$content .= '<link href="'.URL_HOMEPAGE.'/css/examples.css" rel="stylesheet" type="text/css">';
				$content .= '<script type="text/javascript" src="'.URL_HOMEPAGE.'/jscripts/jquery-impromptu.1.5.js"></script>';
				$content .= '<script type="text/javascript" charset="utf-8">
								$.prompt("'._ADD_CART.'",{buttons:{"'._GO_CART.'":"'.URL_HOMEPAGE.'/product/cart.html","'._CONTINUE.'":"'.URL_HOMEPAGE.'/product/cat/'.$catid.'/.html"},
								callback:function(buttonVal) {
									window.location.href = buttonVal;
								}});
				</script>';
			} else {
				$content .= '<link href="'.URL_HOMEPAGE.'/css/examples.css" rel="stylesheet" type="text/css">';
				$content .= '<script type="text/javascript" src="'.URL_HOMEPAGE.'/jscripts/jquery-impromptu.1.5.js"></script>';
				$content .= '<script type="text/javascript" charset="utf-8">
								$.prompt("'._ADD_CART.'",{buttons:{"'._GO_CART.'":"'.URL_HOMEPAGE.'/product/cart.html","'._CONTINUE.'":"'.URL_HOMEPAGE.'/home.html"},
								callback:function(buttonVal) {
									window.location.href = buttonVal;
								}});
				</script>';
			}
			return $content;
			break;
			
		case 'cart':
			$_SESSION['url'] = $_SERVER['QUERY_STRING'];
			$check_cart = $oProduct->check_cart($_SESSION['Shopping']);
			if($check_cart > 0){
				$cart = $oProduct->show_cart($_SESSION['Shopping']);
				$total_money = 0;
				for($i=0;$i < count($cart); $i++){
					$incart[$i]['Product_ID'] = $cart[$i]['Pro_ID'];
					$incart[$i]['Shopping_ID'] = $cart[$i]['Shopping_ID'];
					$incart[$i]['Product_Name'] = $cart[$i]['Product_Name'.SUFFIX];
					$incart[$i]['Product_Code'] = $cart[$i]['Product_Code'];
					$incart[$i]['Amount'] = $cart[$i]['Amount'];
					//$incart[$i]['Currency_Code'] = $cart[$i]['Currency_Code'];
					//$cart[$i]['Sale'] = str_replace(".","",$cart[$i]['Sale']);
					$incart[$i]['Price'] = number_format(str_replace(".","",$cart[$i]['Price'.SUFFIX]), 0, '.', '.');
					$incart[$i]['Money'] = number_format($cart[$i]['Price'.SUFFIX]*$cart[$i]['Amount'], 0, '.', '.');
					$total_money = $total_money + ($cart[$i]['Price'.SUFFIX] * $cart[$i]['Amount']);
				}
					$total_money = number_format($total_money,0, '.', '.');
					$smarty->assign("inncart",$incart);
					$smarty->assign("cart",$cart);
					$smarty->assign("total_money",$total_money);
					$smarty->assign("check_cart",$check_cart);
					return $smarty->fetch($template."/product/cart.html");
			}else{
					return $function->msg_box_client($template,_NULL_CART,1,URL_HOMEPAGE."/".$url);
				}
		break;
		case 'update_cart':
			$num_item = intval($_POST['numitem']);
			for($i=1;$i <= $num_item;$i++){
				$Cart_ID = intval($_POST['Cart_ID'.$i]);
				$amount = intval($_POST['amount'.$i]);
				if($amount == 0) {
					$oProduct->remove_product_cart2($Cart_ID);
				} else {
					$oProduct->update_amount($Cart_ID,$amount);
				}
			}
			$url = str_replace("mod=","",$_SESSION['url']);
			$url = str_replace("&a=","/",$url);
			$url = str_replace("&catid=","/",$url);
			$url = str_replace("&id=","/",$url);
			$url = str_replace("&str=","/",$url);
			$url = str_replace("&page=","/",$url);
			$url = $url.".html";
			return $function->goto_url(URL_HOMEPAGE."/".$url);
		break;
		case 'removecart':
			$check = $_POST['del_item'];
			if($check != null){
				foreach($check as $id){
					$cartid = intval($id);
					$oProduct->remove_cart($cartid,$_SESSION['Shopping']);
				}
			}
			$url = str_replace("mod=","",$_SESSION['url']);
			$url = str_replace("&a=","/",$url);
			$url = str_replace("&catid=","/",$url);
			$url = str_replace("&id=","/",$url);
			$url = str_replace("&str=","/",$url);
			$url = str_replace("&page=","/",$url);
			$url = $url.".html";
			return $function->msg_box_client($template,_DEL_CART,1,URL_HOMEPAGE."/product/cart.html");
		break;
		case 'order':
			$check_cart = $oProduct->check_cart($_SESSION['Shopping']);
			if($check_cart > 0){
				$_SESSION['url'] = $_SERVER['QUERY_STRING'];
				$cart = $oProduct->show_cart($_SESSION['Shopping']);
				$total_money = 0;
				$strorder = "";
				for($i=0;$i < count($cart); $i++){
					$incart[$i]['Product_ID'] = $cart[$i]['Pro_ID'];
					$incart[$i]['ID'] = $cart[$i]['ID'];
					$incart[$i]['Product_Name'] = $cart[$i]['Product_Name'.SUFFIX];
					$incart[$i]['Product_Code'] = $cart[$i]['Product_Code'];
					//$incart[$i]['Currency_Code'] = $cart[$i]['Currency_Code'];
					$incart[$i]['Amount'] = $cart[$i]['Amount'];
					$incart[$i]['Price'] = number_format(str_replace(".","",$cart[$i]['Price'.SUFFIX]), 0, '.', '.');
					$incart[$i]['Money'] = number_format($cart[$i]['Price'.SUFFIX]*$cart[$i]['Amount'], 0, '.', '.');
					$total_money = $total_money + ($cart[$i]['Price'.SUFFIX] * $cart[$i]['Amount']);
					$strorder .= "|".$incart[$i]['Product_Name']."_".$incart[$i]['Product_Code']."_".$incart[$i]['Price']."_".$incart[$i]['Amount']."_".$incart[$i]['Money'];
				}
				$_SESSION['strorder'] = $strorder;
				$total_money = number_format($total_money,0, '.', '.');
				$smarty->assign("inncart",$incart);
				$smarty->assign("total_money",$total_money);
				$smarty->assign("check_cart",$check_cart);
				$chars_rand = explode("/",$function->chars_rand(6));
				$_SESSION["code_verify"] = $chars_rand[0];
				return $smarty->fetch($template."/product/order.html");
			}else{
				return $function->msg_box_client($template,_NULL_CART,1,URL_HOMEPAGE);
			}
		break;
		case 'order_detail':
			global $mailadmin;
			$data['fullname'] = stripslashes($function->FixQuotes($_POST['fullname']));
			$data['address'] = stripslashes($function->FixQuotes($_POST['address']));
			$data['phone'] = stripslashes($function->FixQuotes($_POST['phone']));
			$data['email'] = stripslashes($function->FixQuotes($_POST['email']));
			$data['requirements'] = stripslashes($function->FixQuotes($_POST['content_1']));
			//	$data['start_date'] = stripslashes($function->FixQuotes($_POST['start_date']));
			$data['txt_verify_register'] = stripslashes($function->FixQuotes($_POST['txt_verify_register']));
			$data['pay_type'] = intval($_POST['pay_type']);
			$_SESSION['order'] = $data;
			if($data['fullname'] == ""){
				return $function->msg_box_client($template,_ERR_FULLNAME,1,URL_HOMEPAGE."/product/order.html");
			}elseif($data['address'] == ""){
				return $function->msg_box_client($template,_ERR_ADDRESS,1,URL_HOMEPAGE."/product/order.html");
			}elseif($data['phone'] == ""){
				return $function->msg_box_client($template,_ERR_PHONE,1,URL_HOMEPAGE."/product/order.html");
			}elseif($data['email'] == ""){
				return $function->msg_box_client($template,_ERR_EMAIL,1,URL_HOMEPAGE."/product/order.html");}
			/*elseif($data['start_date'] == ""){
				return $function->msg_box("Vui lòng chọn thời gian nhận hàng",1,URL_HOMEPAGE."product/order.html");}*/
			elseif($data['txt_verify_register'] != $_SESSION["code_verify"]){
				return $function->msg_box_client($template,_ERR_VERIFY_DIFF,2,URL_HOMEPAGE."/product/order.html");
			}else{
				$oProduct->insert_order($data,$_SESSION['strorder']);
				$order_id = $oProduct->get_lastest_order_id();
				$oProduct->delete_cart($_SESSION['Shopping']);
				unset($_SESSION['strorder']);
				unset($_SESSION['order']);
				unset($_SESSION['Shopping']);
				if($data['pay_type'] == 2) {  // pay_type = 1: thanh toan khi giao hang, pay_type = 2 thanh toan qua ngan luong
					return $function->msg_box_client($template,_SUCCESS_SHOPPING_NGANLUONG,3,URL_HOMEPAGE."/product/order_confirm/".$order_id."/confirm.html");
				} else return $function->msg_box_client($template,_SUCCESS_SHOPPING,10,URL_HOMEPAGE);
			}
		break;
		
		case "order_confirm":
			$oid = isset($_GET['id']) ? intval($_GET['id']) : 0;
			$rs = $oProduct->get_lastest_order($oid);
			$total_money = 0;
			if($rs['Order_ID'] != $oid) {
				return $function->msg_box_client($template,_ERROR_CONFIRM_PAYMENT,3,URL_HOMEPAGE);
			} else {
				$order_detail = explode("|", $rs['Description']);
				for($i = 1; $i < count($order_detail); $i++) {
					$order_detail1[$i] = explode("_", $order_detail[$i]);
					for($j=1; $j <= count($order_detail1); $j++) {
						$detail[$j]['Product_Name'] = $order_detail1[$j][0];
						$detail[$j]['Product_Code'] = $order_detail1[$j][1];
						$detail[$j]['Price'] = $order_detail1[$j][2];
						$detail[$j]['Amount'] = $order_detail1[$j][3];
						$detail[$j]['Money'] = $order_detail1[$j][4];
						$total_money = $total_money + (str_replace(".","",$order_detail1[$j][2])*$order_detail1[$j][3]);
					}
				}
				// thong tin gui sang ngan luong
				$receiver= "koolin.ngannguyen@gmail.com";
				//Khai báo url trả về 
				$return_url= URL_HOMEPAGE."/product/complete/".$oid."/complete.html";
				//Giá của cả giỏ hàng 
				$price=$total_money;
				//Mã đơn hàng 
				$order_code=$oid;
				//Thông tin giao dịch
				$transaction_info="Thanh toan mua hang";
				$currency= "vnd";
				$quantity=1;
				$tax=0;
				$discount=0;
				$fee_cal=0;
				$fee_shipping=0;
				$order_description="";
				$buyer_info="";
				$affiliate_code="";
				$nl = new NL_Checkout();
				//Tạo link thanh toán đến nganluong.vn
				$url= $nl->buildCheckoutUrlNew($return_url, $receiver, $transaction_info, $order_code, $price, $currency, $quantity, $tax, $discount , $fee_cal,    $fee_shipping, $order_description, $buyer_info , $affiliate_code);
				//------------------------------
				$smarty->assign("total_money", number_format($total_money,0, '.', '.'));
				$smarty->assign("rs", $rs);
				$smarty->assign("detail", $detail);
				$smarty->assign("url", $url);
				return $smarty->fetch($template."/product/confirm_payment.html");
			}
		break;
		
		case "complete":
			//Lấy kết quả trả về từ ngân lượng
			$oid = intval($_GET['oid']);
			//Lấy thông tin giao dịch
			$transaction_info=$_GET["transaction_info"];
			//Lấy mã đơn hàng 
			$order_code=$_GET["order_code"];
			//Lấy tổng số tiền thanh toán tại ngân lượng 
			$price=$_GET["price"];
			//Lấy mã giao dịch thanh toán tại ngân lượng
			$payment_id=$_GET["payment_id"];
			//Lấy loại giao dịch tại ngân lượng (1=thanh toán ngay ,2=thanh toán tạm giữ)
			$payment_type=$_GET["payment_type"];
			//Lấy thông tin chi tiết về lỗi trong quá trình giao dịch
			$error_text=$_GET["error_text"];
			//Lấy mã kiểm tra tính hợp lệ của đầu vào 
			$secure_code=$_GET["secure_code"];
			
			//Xử lí đầu vào 
			
			$nl= new NL_Checkout();
			$check= $nl->verifyPaymentUrl($transaction_info, $order_code, $price, $payment_id, $payment_type, $error_text, $secure_code);
			if($check) {	
				//$html .="<div align=\"center\">Cám ơn quý khách, quá trình thanh toán đã được hoàn tất. Chúng tôi sẽ kiểm tra và chuyển hàng sớm!</div>";
				$oProduct->update_order_nganluong($order_code, $payment_id);
				return $function->msg_box_client($template,_SUCCESS_SHOPPING_NGANLUONG2,5,URL_HOMEPAGE);
			} else {
				//$html.="Quá trình thanh toán không thành công bạn vui lòng thực hiện lại";
				return $function->msg_box_client($template,_ERROR_SHOPPING_NGANLUONG,5,URL_HOMEPAGE);
			}
		break;
	}
}

function search_process_client() {
	global $db, $smarty, $function,$template,$module;
	$oProduct = new Product;
	$oCategory = new Category;
	$a = isset($_GET['a']) ? $_GET['a'] : "home";
	$smarty->assign("module_title",_SEARCH);
	switch(strtolower($a)){
		case "search":
		default:
			if(isset($_POST['Search'])) {
				$param = stripslashes($function->FixQuotes($_POST['Search']));
				$list = $oProduct->search($param);
				//print_r($list);exit;
				$smarty->assign('ls', $list);
				return $smarty->fetch($template."/product/search.html");
			} else {
				return $function->goto_url(URL_HOMEPAGE);
			}
		break;
		
	}
}
?>