<?php
function block_process_admin(){
	global $db, $smarty, $function,$module,$arr_r,$template;
	$oBlock = new Block;
	$oCms = new Cms;
	$a = isset($_GET['a']) ? $_GET['a'] : "";
	if($_SESSION['logined_information_detail']['IsAdmin'] == 0){
		return $function->msg_box("Bạn không được phép truy cập chức năng này.<br /><a href='index.php?module=homepage'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"index.php?module=homepage",2);}
	switch(strtolower($a)){
		case "block_manager":
		default:
			$tpl = isset($_GET['tpl']) ? $_GET['tpl'] : "default";
			$smarty->assign("tpl",$tpl);
			//lay tong so file hien co
			$dir = DIRECTORY_SITE."/block/";
			$files = scandir($dir);
			$files = $function->array_remove($files,"..");
			$files = $function->array_remove($files,".");
			$num_files = count($files);
			$smarty->assign("num_files",$num_files);
			//ket thuc lay tong so file
			$rs = $oBlock->show_all_block_in_template($tpl);
			$smarty->assign("rs", $rs);
			for($i=0; $i < count($rs); $i++){
				$block_module[$i] = $oBlock->show_all_module_block($rs[$i]['Block_ID']);
			}
			$smarty->assign("block_module",$block_module);
			//lay so luong file da su dung
			$num_file = count($rs);
			$smarty->assign("num_file",$num_file);
			//ket thu
			$list_template = $function->printTree(TEMPLATE_URL);
			$list_template = $function->array_remove($list_template,"..");
			$list_template = $function->array_remove($list_template,".");
			$smarty->assign('list_template',$list_template);
			if($_POST['submit']){
				$block_id = $_POST['block_id'];
				$st = $_POST['st'];
				$i = 0;
				foreach($block_id as $id){
					$id = intval($id);
					$oBlock->update_st($id,$st[$i]);
					$i++;
				}
				return $function->msg_box("Vị trí các Block đã được cập nhật.<br /><a href='?module=block'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=block&a=block_manager",1);
			}
			if($_POST['Add']){
				$function->goto_url("index.php?module=block&a=block_add&tpl=".$_POST['list_template']);
			}
			return $smarty->fetch("block/block_manager.html");
		break;

		case "block_add":
			$tpl = isset($_GET['tpl']) ? $_GET['tpl'] : "default";
			$smarty->assign("tpl",$tpl);
			if($_POST['submit']){
				$title = stripslashes($function->FixQuotes($_POST['title']));
				$file_style = $_POST['file_style'];
				$file_source = $_POST['file_source'];
				$file_source = 'block/'.$file_source;
				$position = intval($_POST['position']);
				$limit = intval($_POST['limit']);
				$per = $_POST['per'];
				if($title == ""){
					return $function->msg_box("Bạn chưa nhập đầy đủ các thông tin yêu cầu. Vui lòng kiểm tra lại.<br /><a href='?module=block&a=block_add'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=block&a=block_add",3);
				}else{
					$max_st = $oBlock->max_st($tpl,$position);
					$st = $max_st['Max_ST'] + 1;
					$oBlock->add_block($title,$tpl,$file_source,$file_style,$position,$st,$limit);
					$new_id = intval($db->db_inserted_id());
					foreach($per as $moduleid){
						$oBlock->insert_block_list($new_id,$moduleid);}
					return $function->msg_box("Đã thêm Block mới.<br /><a href='?module=block&tpl=".$tpl."'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=block&tpl=".$tpl,1);
				}
			}else{
				$dir = DIRECTORY_SITE."/block/";
				$files = scandir($dir);
				$files = $function->array_remove($files,"..");
				$files = $function->array_remove($files,".");
				if($files){
					for($i=0;$i<count($files);$i++){
						$check_file_php = $oBlock->check_file_php($tpl,$files[$i]);
						if($check_file_php == 0){$list_file[$i] = $files[$i];}
					}
				}
				$smarty->assign('list_file',$list_file);
				$dir_style = TEMPLATE_URL.$tpl."/block";
				$files_style = scandir($dir_style);
				$files_style = $function->array_remove($files_style,"..");
				$files_style = $function->array_remove($files_style,".");
				$smarty->assign("files_style",$files_style);
				$module_l = $oCms->show_all_module();
				$smarty->assign('module_l',$module_l);
				return $smarty->fetch("block/block_add.html");
			}
		break;

		case "block_edit":
			$block_id = isset($_GET['block_id']) ? intval($_GET['block_id']) : 0;
			$block_info = $oBlock->show_block($block_id);
			$smarty->assign("block_info", $block_info);
			if($_POST['submit']){
				$title = stripslashes($function->FixQuotes($_POST['title']));
				$file_style = $_POST['file_style'];
				$file_source = $_POST['file_source'];
				$file_source = 'block/'.$file_source;
				$position = intval($_POST['position']);
				$limit = intval($_POST['limit']);
				if($title == ""){
					return $function->msg_box("Có lỗi trong quá trình thay đổi thông tin. Vui lòng thử lại.<br /><a href='?module=block&a=block_edit&block_id=".$block_id."'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=block&a=block_edit&block_id=".$block_id,3);
				}else{
					$oBlock->edit_block($block_id,$title,$file_source,$file_style,$position,$limit);
				return $function->msg_box("Thay đổi thông tin thành công.<br /><a href='?module=block&a=block&tpl=".$block_info['Template']."'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=block&tpl=".$block_info['Template'],1);
				}
			}else{
				$dir = DIRECTORY_SITE."/block/";
				$files = scandir($dir);
				$files = $function->array_remove($files,"..");
				$files = $function->array_remove($files,".");
				if($files){
					for($i=0;$i<count($files);$i++){
						$check_file_php = $oBlock->check_file_php($template,$files[$i]);
						if($check_file_php == 0){ $list_file[$i] = $files[$i];}
						else{	$temp = "block/".$files[$i];
							if($temp == $block_info['Source']){$list_file[$i] = $files[$i];}
						}
					}
				}
				$smarty->assign('list_file',$list_file);
				$dir_style = TEMPLATE_URL.$block_info['Template']."/block";
				$files_style = scandir($dir_style);
				$files_style = $function->array_remove($files_style,"..");
				$files_style = $function->array_remove($files_style,".");
				$smarty->assign("files_style",$files_style);
				return $smarty->fetch("block/block_edit.html");
			}
		break;

		case "block_delete":
			$tpl = isset($_GET['tpl']) ? $_GET['tpl'] : "default";
			$block_id = isset($_GET['block_id']) ? intval($_GET['block_id']) : 0;
			$oBlock->del_block($block_id);
			$oBlock->del_block_list($block_id);
			return $function->msg_box("Đã xóa Block.<br /><a href='?module=block&a=block&tpl=".$tpl."'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=block&a=block_manager&tpl=".$tpl,1);
		break;
		case "remove_block_page":
			if($_SESSION['logined_information_detail']['IsAdmin'] == 0){
				return $function->msg_box("Bạn không được phép truy cập chức năng này.<br /><a href='index.php?module=homepage'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"index.php?module=homepage",2);
			}
			$tpl = isset($_GET['tpl']) ? $_GET['tpl'] : "default";
			$listid = isset($_GET['listid']) ? intval($_GET['listid']) : 0;
			$oBlock->remove_block_page($listid);
			return $function->msg_box("Đã xóa block thể hiện trên trang.<br /><a href='?module=block&a=block&tpl=".$tpl."'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=block&a=block_manager&tpl=".$tpl,1);
		break;
		case "block_add_page":
			$block_id = isset($_GET['block_id']) ? intval($_GET['block_id']) : 0;
			$block_info = $oBlock->show_block($block_id);
			$smarty->assign("block_info", $block_info);
			if($_SESSION['logined_information_detail']['IsAdmin'] == 0){
				return $function->msg_box("Bạn không được phép truy cập chức năng này.<br /><a href='index.php?module=homepage'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"index.php?module=homepage",2);
			}
			if($_POST['submit']){
				$per = $_POST['per'];
				if($per != null){
					foreach($per as $moduleid){
						$oBlock->insert_block_list($block_id,$moduleid);}
				}
				return $function->msg_box("Đã thêm trang thể hiện Block.<br /><a href='?module=block&a=block&tpl=".$block_info['Template']."'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=block&tpl=".$block_info['Template'],1);
			}else{
				$module_l = $oCms->show_all_module_no_block($block_id);
				$smarty->assign("module_l",$module_l);
				return $smarty->fetch("block/block_add_page.html");
			}
		break;
	}
}
?>