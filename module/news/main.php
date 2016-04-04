<?php
function news_process_admin(){
	global $db, $smarty, $function,$module,$arr_r;
	$oNews = new News;
	$oCms = new Cms;
	$a = isset($_GET['a']) ? $_GET['a'] : "";
	$module_info = $oCms->module_infomation($module);
	$oModuleID = $module_info['Module_ID'];
	if(!in_array($oModuleID,$arr_r)){
		return $function->msg_box("Bạn không được phép truy cập chức năng này.<br /><a href='index.php?module=homepage'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"index.php?module=homepage",2);}
	switch(strtolower($a)){
		case "news_manager":
		default:
			$numf = $oNews->get_nums_news();
			$all_page = $numf ? $numf : 1; 
			$page = isset($_GET['page']) ? intval($_GET['page']) : 0;
			$base_url = "?module=news&a=news_manager";
			$paging = $function->generate_page($base_url, $all_page, 20, $page);
			$rs = $oNews->show_all_news($page, 20);
			$smarty->assign("paging", $paging);
			$smarty->assign("rs", $rs);
			return $smarty->fetch("news/news_manager.html");
		break;
		case "news_add":
			global $max_size,$files_mime,$extension;
			if(isset($_POST['submit'])){
				$title = stripslashes($function->FixQuotes($_POST['title']));
				$title_en = stripslashes($function->FixQuotes($_POST['title_en']));
				$summary = stripslashes($function->FixQuotes($_POST['summary']));
				$summary_en = stripslashes($function->FixQuotes($_POST['summary_en']));
				$description = stripslashes($function->FixQuotes($_POST['description']));
				$description_en = stripslashes($function->FixQuotes($_POST['description_en']));
				$source = stripslashes($function->FixQuotes($_POST['source']));
				$_SESSION['news']['title'] = $title;
				$_SESSION['news']['title_en'] = $title_en;
				$_SESSION['news']['summary'] = $summary;
				$_SESSION['news']['description'] = $description;
				$_SESSION['news']['summary_en'] = $summary_en;
				$_SESSION['news']['description_en'] = $description_en;
				$_SESSION['news']['source'] = $source;
				if($title == "" or $summary == ""  or $description == '' or $title_en == "" or $summary_en == ""  or $description_en == ''){
					return $function->msg_box("Bạn chưa nhập đầy đủ các thông tin yêu cầu. Vui lòng kiểm tra lại.<br /><a href='?module=news&a=news_add'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=news&a=news_add",3);
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
							return $function->msg_box("Không thể upload tập tin. Kích thước tập tin lớn hơn " . $max_size . " byte.<br /><a href='?module=news&a=news_add'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=news&a=news_add",3);}
						if(!in_array($files_extension,$extension) || !in_array($file_type,$files_mime)){
                            return $function->msg_box("Loại tập tin hoặc phần mở rộng của tập tin không được thêm.<br /><a href='?module=news&a=news_add'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=news&a=news_add",3);}
						$real_name = $function->chars_rand(3).$_FILES['filename']['name'];
						include(DIRECTORY_SITE."/class/resize.class.php");
						$resize = new resize("filename", 76);
						$resize->saveTo($real_name, IMG_NEWS_THUMB);
					}
					$oNews->add_news($_SESSION['news'],$real_name);
					$oCms->add_diary($oModuleID,$_SESSION['logined_information_detail']['Admin_ID'],"Thêm tin tức.");
					unset($_SESSION['news']);
					return $function->msg_box("Tin tức đã được thêm.<br /><a href='?module=news&a=news'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=news",1);
				}
			}else{
				$sBasePath = "../CKEditor/";
				$CKEditor = new CKEditor();
				$CKEditor->returnOutput = true;
				$CKEditor->basePath = $sBasePath;
				$CKEditor->config['width'] = '100%';
				$CKEditor->config['filebrowserBrowseUrl'] = $sBasePath.'ckfinder/browse.php';
				$CKEditor->config['filebrowserImageBrowseUrl'] = $sBasePath.'ckfinder/browse.php?type=Images';
				$CKEditor->config['filebrowserFlashBrowseUrl'] = $sBasePath.'ckfinder/browse.php?type=Flash';
				$CKEditor->config['filebrowserUploadUrl'] = $sBasePath.'ckfinder/upload.php';
				$CKEditor->config['filebrowserImageUploadUrl'] = $sBasePath.'ckfinder/upload.php?type=Images';
				$CKEditor->config['filebrowserFlashUploadUrl '] = $sBasePath.'ckfinder/browse.php?type=Flash';
				$initialValue = "";
				$description = $CKEditor->editor("description", $initialValue);
				$description_en = $CKEditor->editor("description_en", $initialValue);
				$smarty->assign("description", $description);
				$smarty->assign("description_en", $description_en);
				return $smarty->fetch("news/news_add.html");
			}
		break;

		case "news_edit":
			global $max_size,$files_mime,$extension;
//			$oCategory = new Category();
//			$category_list = $oCategory->category_list(0,$module,0,'Category_Name','asc');
//			$smarty->assign('category_list',$category_list);
			$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
			$news = $oNews->show_news($id);
			$smarty->assign("news", $news);
			if(isset($_POST['submit'])){
				$title = stripslashes($function->FixQuotes($_POST['title']));
				$summary = stripslashes($function->FixQuotes($_POST['summary']));
				$description = stripslashes($function->FixQuotes($_POST['description']));
				$title_en = stripslashes($function->FixQuotes($_POST['title_en']));
				$summary_en = stripslashes($function->FixQuotes($_POST['summary_en']));
				$description_en = stripslashes($function->FixQuotes($_POST['description_en']));
				$source = stripslashes($function->FixQuotes($_POST['source']));
				$data['title'] = $title;
				$data['summary'] = $summary;
				$data['description'] = $description;
				$data['title_en'] = $title_en;
				$data['summary_en'] = $summary_en;
				$data['description_en'] = $description_en;
				$data['source'] = $source;
				$dcheck = isset($_POST['del_image']) ? intval($_POST['del_image']) : 0;
				if($title == "" or $summary == ""  or $description == ''){
				return $function->msg_box("Có lỗi trong quá trình thay đổi thông tin. Vui lòng thử lại.<br /><a href='?module=news&a=news_edit&id=".$id."'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=news&a=news_edit&id=".$id,3);
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
							return $function->msg_box("Không thể upload tập tin. Kích thước hình lớn hơn " . $max_size ." byte.<br /><a href='?module=news&a=news_edit&id=".$id."'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=news&a=news_edit&id=".$id,3);}
						if(!in_array($files_extension,$extension) || !in_array($file_type,$files_mime)){
							return $function->msg_box("Loại tập tin hoặc phần mở rộng của tập tin không được phép thêm.<br /><a href='?module=news&a=news_edit&id=".$id."'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=news&a=news_edit&id=".$id,3);}
						$real_name = $function->chars_rand(3).$_FILES['filename']['name'];
						include(DIRECTORY_SITE."/class/resize.class.php");
						$resize = new resize("filename", 76);
						$resize->saveTo($real_name, IMG_NEWS_THUMB);
						if($news['Image_Name'] != ''){
							@unlink(IMG_NEWS_THUMB.$news['Image_Name']);}
					}else{
						if($news['Image_Name'] != ''){
							if($dcheck == 1){
								@unlink(IMG_NEWS_THUMB.$news['Image_Name']);
								$real_name = '';
							}else{
								$real_name = $news['Image_Name'];
							}
						}else{
							$real_name = '';
						}
					}
				}
				$oNews->edit_news($id,$data,$real_name);
				$oCms->add_diary($oModuleID,$_SESSION['logined_information_detail']['Admin_ID'],"Cập nhật nội dung tin tức.");
				return $function->msg_box("Cập nhật thành công.<br /><a href='?module=news'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=news",1);
			}else{
				$sBasePath = "../CKEditor/";
				$CKEditor = new CKEditor();
				$CKEditor->returnOutput = true;
				$CKEditor->basePath = $sBasePath;
				$CKEditor->config['width'] = '100%';
				$CKEditor->config['filebrowserBrowseUrl'] = $sBasePath.'ckfinder/browse.php';
				$CKEditor->config['filebrowserImageBrowseUrl'] = $sBasePath.'ckfinder/browse.php?type=Images';
				$CKEditor->config['filebrowserFlashBrowseUrl'] = $sBasePath.'ckfinder/browse.php?type=Flash';
				$CKEditor->config['filebrowserUploadUrl'] = $sBasePath.'ckfinder/upload.php';
				$CKEditor->config['filebrowserImageUploadUrl'] = $sBasePath.'ckfinder/upload.php?type=Images';
				$CKEditor->config['filebrowserFlashUploadUrl '] = $sBasePath.'ckfinder/browse.php?type=Flash';
				$initialValue = $news['Description'];
				$initialValue_en = $news['Description_EN'];
				$description = $CKEditor->editor("description", $initialValue);
				$smarty->assign("description", $description);
				$description_en = $CKEditor->editor("description_en", $initialValue_en);
				$smarty->assign("description_en", $description_en);
				return $smarty->fetch("news/news_edit.html");
			}
		break;

		case "news_delete":
			$check = $_POST['check_del'];
			if($check != null){
				foreach($check as $id){
					$id= intval($id);
					$news = $oNews->show_news($id);
					if($news['Image_Name'] !=''){
					@unlink(IMG_NEWS_THUMB.$news['Image_Name']);}
					$oNews->del_news($id);
					$oCms->add_diary($oModuleID,$_SESSION['logined_information_detail']['Admin_ID'],"Xóa tin tức.");
				}
			}
			return $function->msg_box("Đã xóa tin tức.<br /><a href='?module=news'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=news",1);
		break;

		case "update_hot":
			$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
			$hot = isset($_GET['hot']) ? intval($_GET['hot']) : 0;
			if($hot == 0){
				$oNews->update_hot($id,1);
			}else{
				$oNews->update_hot($id,0);
			}
			$oCms->add_diary($oModuleID,$_SESSION['logined_information_detail']['Admin_ID'],"Cập nhật trạng thái tin tức.");
			return $function->msg_box("Đã cập nhật trạng thái tin tức.<br /><a href='?module=news'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=news",1);
		break;
	}
}

function news_process_client(){
	global $db, $smarty, $function,$template,$limit_string;
	$oNews = new News;
	$oCategory = new Category;
	$a = isset($_GET['a']) ? $_GET['a'] : "home";
	$smarty->assign("module_title",_NEWS);
	//include('data/news_setting.php');
	//$smarty->assign("resize_width_n",$resize_width);
	//$smarty->assign("resize_height_n",$resize_height);
	switch(strtolower($a)){
		case "home":
		default:
			$numf = $oNews->get_nums_news();
			$all_page = $numf ? $numf : 1;
			$perpage = 3;
			$page = isset($_GET['page']) ? intval($_GET['page']) : 0;
			$base_url = URL_HOMEPAGE."/news/home";
			$paging = $function->generate_page_client($base_url, $all_page, $perpage, $page);
			$list = $oNews->show_all_news2($page, $perpage);
			$smarty->assign("paging", $paging);
			$smarty->assign("list", $list);
			return $smarty->fetch($template."/news/index.html");
		break;
		
		case "view":
			$news_id = isset($_GET['id']) ? $_GET['id'] : 0;
			$oNews->update_view($news_id);
			$news_detail = $oNews->show_news($news_id);
			$smarty->assign("news_detail",$news_detail);
			$order_info = $oNews->show_order_news_client($news_id,'News_ID','desc',0,5);
			$smarty->assign("order_info",$order_info);
			return $smarty->fetch($template."/news/view.html");
		break;
	}
}
?>