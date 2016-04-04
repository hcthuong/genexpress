<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Thuong
 * Date: 4/5/14
 * Time: 11:08 AM
 * To change this template use File | Settings | File Templates.
 */

function information_process_admin() {
    global $smarty, $function;

    $oInfor = new Information();
    $a = isset($_GET['a']) ? $_GET['a'] : "";

    switch(strtolower($a)) {

        // information
        default:
        case "list":
            $list = $oInfor->getInformationList();
            $smarty->assign("rs", $list);
            return $smarty->fetch("information/in_list.html");
            break;

        case "add":
            global $max_size,$files_mime,$extension;
            if(isset($_POST['btn_submit'])) {
                $data['InCat_ID'] = intval($_POST['information_category']);
                $data['Title'] = stripcslashes($function->FixQuotes($_POST['title']));
                $data['Title_EN'] = stripcslashes($function->FixQuotes($_POST['title_en']));
                $data['Summary'] = stripcslashes($function->FixQuotes($_POST['summary']));
                $data['Summary_EN'] = stripcslashes($function->FixQuotes($_POST['summary_en']));
                $data['Description'] = stripcslashes($function->FixQuotes($_POST['description']));
                $data['Description_EN'] = stripcslashes($function->FixQuotes($_POST['description_en']));
                $data['Source'] = stripcslashes($function->FixQuotes($_POST['source']));
                $data['Created'] = date("Y-m-d H:i:s");
                $real_name = "";
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
                    $resize = new resize("filename", 120);
                    $resize->saveTo($real_name, IMG_NEWS_THUMB);
                }
                $data['Image'] = $real_name;
                $good = $oInfor->informationAdd($data);
                if($good) {
                    return $function->msg_box("Đã thêm thành công!<br /><a href='?module=information'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=information",1);
                } else return $function->msg_box("Có lỗi xảy ra trong quá trình thực hiện. Xin vui lòng thử lại!<br /><a href='?module=information&a=add'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=information&a=add",3);
            } else {
                $rs = $oInfor->getAllInformationCategory();
                for($i=0; $i < count($rs); $i++) {
                    $sub[$i] = $oInfor->getAllChildInformationCategory($rs[$i]['InCat_ID']);
                }
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
                $smarty->assign("rs", $rs);
                $smarty->assign("sub", $sub);
                return $smarty->fetch("information/in_add.html");
            }
            break;

        case "update":
            global $max_size,$files_mime,$extension;
            if(isset($_POST['btn_submit'])) {
                $id = intval($_POST['id']);
                $data['InCat_ID'] = intval($_POST['information_category']);
                $data['Title'] = stripcslashes($function->FixQuotes($_POST['title']));
                $data['Title_EN'] = stripcslashes($function->FixQuotes($_POST['title_en']));
                $data['Summary'] = stripcslashes($function->FixQuotes($_POST['summary']));
                $data['Summary_EN'] = stripcslashes($function->FixQuotes($_POST['summary_en']));
                $data['Description'] = stripcslashes($function->FixQuotes($_POST['description']));
                $data['Description_EN'] = stripcslashes($function->FixQuotes($_POST['description_en']));
                $data['Source'] = stripcslashes($function->FixQuotes($_POST['source']));
                $data['Updated'] = date("Y-m-d H:i:s");
                $old_img = stripcslashes($function->FixQuotes($_POST['old_img']));
                if(isset($_FILES['filename']) && !empty($_FILES['filename']['tmp_name'])){
                    @unlink($old_img);
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
                    $resize = new resize("filename", 120);
                    $resize->saveTo($real_name, IMG_NEWS_THUMB);
                } else {
                    $real_name = $old_img;
                }
                $data['Image'] = $real_name;
                $good = $oInfor->informationUpdate($id, $data);
                if($good) {
                    return $function->msg_box("Đã cập nhật thành công!<br /><a href='?module=information'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=information",1);
                } else return $function->msg_box("Có lỗi xảy ra trong quá trình thực hiện. Xin vui lòng thử lại!<br /><a href='?module=information&a=update&id='".$id.">(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=information&a=update".$id,3);
            } else {
                $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
                $detail = $oInfor->getInformationDetail($id);
                $rs = $oInfor->getAllInformationCategory();
                for($i=0; $i < count($rs); $i++) {
                    $sub[$i] = $oInfor->getAllChildInformationCategory($rs[$i]['InCat_ID']);
                }
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
                $description = $CKEditor->editor("description", $detail['Description']);
                $description_en = $CKEditor->editor("description_en", $detail['Description_EN']);
                $smarty->assign("description", $description);
                $smarty->assign("description_en", $description_en);
                $smarty->assign("rs", $rs);
                $smarty->assign("sub", $sub);
                $smarty->assign("detail", $detail);
                return $smarty->fetch("information/in_update.html");
            }
            break;

        case "delete":
            $checked = $_POST['check_del'];
            foreach($checked as $id) {
                $id = intval($id);
                $imageName = $oInfor->getImageName($id);
                @unlink(URL_NEWS_THUMB.$imageName);
                $oInfor->informationDelete($id);
            }
            return $function->msg_box("Đã xóa thành công!<br /><a href='?module=information&a=list'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=information&a=list",1);
            break;

        // information category
        case "icadd":
            if(isset($_POST['btn_submit'])) {
                $data['Name'] = stripcslashes($function->FixQuotes($_POST['name']));
                $data['Name_EN'] = stripcslashes($function->FixQuotes($_POST['name_en']));
                $data['ParentID'] = intval($_POST['cat']);
                $good = $oInfor->informationAddCategory($data);
                if($good) {
                    return $function->msg_box("Đã thêm thành công!<br /><a href='?module=information&a=iclist'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=information&a=iclist",1);
                } else return $function->msg_box("Có lỗi xảy ra trong quá trình thực hiện. Xin vui lòng thử lại!<br /><a href='?module=information&a=icadd'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=information&a=icadd",3);
            } else {
                $list = $oInfor->getAllInformationCategory();
                $smarty->assign("list_category_parent", $list);
                return $smarty->fetch("information/ic_add.html");
            }
            break;

        case "icupdate":
            if(isset($_POST['btn_submit'])) {
                $id = intval($_POST['icid']);
                $data['Name'] = stripcslashes($function->FixQuotes($_POST['name']));
                $data['Name_EN'] = stripcslashes($function->FixQuotes($_POST['name_en']));
                $data['ParentID'] = intval($_POST['cat']);
                $good = $oInfor->informationUpdateCategory($id, $data);
                if($good) {
                    return $function->msg_box("Đã cập nhật thành công!<br /><a href='?module=information&a=iclist'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=information&a=iclist",1);
                } else return $function->msg_box("Có lỗi xảy ra trong quá trình thực hiện. Xin vui lòng thử lại!<br /><a href='?module=information&a=icupdate&id='".$id.">(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=information&a=icupdate&id=".$id,3);
            } else {
                $id = isset($_GET['icid']) ? intval($_GET['icid']) : 0;
                $detail = $oInfor->getInformationCategory($id);
                $smarty->assign("detail", $detail);
                $list = $oInfor->getAllInformationCategoryExceptOne($id);
                $smarty->assign("list_category_parent", $list);
                return $smarty->fetch("information/ic_update.html");
            }
            break;

        case "icdelete":
            $id = isset($_GET['icid']) ? intval($_GET['icid']) : 0;
            $oInfor->informationDeleteCategory($id);
            return $function->msg_box("Đã xóa thành công!<br /><a href='?module=information&a=iclist'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=information&a=iclist",1);
            break;

        case "iclist":
            $rs = $oInfor->getAllInformationCategory();
            for($i=0; $i < count($rs); $i++) {
                $sub[$i] = $oInfor->getAllChildInformationCategory($rs[$i]['InCat_ID']);
            }
            $smarty->assign("res", $rs);
            $smarty->assign("child", $sub);
            return $smarty->fetch("information/ic_list.html");
            break;
    }
}

function information_process_client() {
    global $function, $smarty, $template;
    $oInfor = new Information();
    $a = isset($_GET['a']) ? $_GET['a'] : "view";
    $smarty->assign("module_title",_ABOUTUS);
    switch(strtolower($a)) {
        default:
        case "view":
            $icid = isset($_GET['cid']) ? intval($_GET['cid']) : 0;
            $page = isset($_GET['page']) ? intval($_GET['page']) : 0;
            $perpage = 5;
            $nums = $oInfor->getNumsOfInformationInCat($icid);
            $all_page = $nums ? $nums : 1;
            $base_url = URL_HOMEPAGE."/information/view/".$icid;
            $paging = $function->generate_page_client($base_url, $all_page, $perpage, $page);
            $list = $oInfor->getAllInformationInCat($icid, $page, $perpage);
            $catname = $oInfor->getInformationCatName($icid);
            $smarty->assign("paging", $paging);
            $smarty->assign("list", $list);
            $smarty->assign("catname", $catname);
            return $smarty->fetch($template."/information/view.html");
            break;

        case "detail":
            $id = isset($_GET['id']) ? intval($_GET['id']) : 0;
            $detail = $oInfor->getInformationDetail2($id);
            // tat ca tin cung chu de - tru tin dang xem
            $list = $oInfor->getNumberInformationInSameCat($detail['Information_CatID'], $id, 10);
            $namecat = $oInfor->getInformationCatName($detail['Information_CatID']);
            $smarty->assign("namecat", $namecat);
            $smarty->assign("list", $list);
            $smarty->assign("detail", $detail);
            return $smarty->fetch($template."/information/detail.html");
            break;
    }
}