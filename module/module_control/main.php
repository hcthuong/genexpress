<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Thuong
 * Date: 4/2/14
 * Time: 2:45 PM
 * To change this template use File | Settings | File Templates.
 */

function module_process_admin() {
    global $smarty, $function;

    $oModule = new Module_Control();
    $a = isset($_GET['a']) ? $_GET['a'] : "";

    switch(strtolower($a)) {

        default:
        case "list":
            $list = $oModule->moduleList();
            $smarty->assign("list", $list);
            return $smarty->fetch("module/module_list.html");
            break;

        case "add":
            if(isset($_POST['btn_submit'])) {
                $data['Module_Name'] = stripcslashes($function->FixQuotes($_POST['module_name']));
                $data['Module_Code'] = stripcslashes($function->FixQuotes($_POST['module_code']));
                $data['Summary'] = stripcslashes($function->FixQuotes($_POST['summary']));
                $data['Description'] = stripcslashes($function->FixQuotes($_POST['description']));
                $data['Act'] = stripcslashes($function->FixQuotes($_POST['act']));
                $good = $oModule->moduleAdd($data);
                if($good) {
                    return $function->msg_box("Đã thêm thành công!<br /><a href='?module=module'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=module",1);
                } else return $function->msg_box("Có lỗi xảy ra trong quá trình thực hiện. Xin vui lòng thử lại!<br /><a href='?module=module&a=add'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=module&a=add",3);
            } else {
                return $smarty->fetch("module/module_add.html");
            }
            break;

        case "update":
            if(isset($_POST['btn_submit'])) {
                $id = intval($_POST['mid']);
                $data['Module_Name'] = stripcslashes($function->FixQuotes($_POST['module_name']));
                $data['Module_Code'] = stripcslashes($function->FixQuotes($_POST['module_code']));
                $data['Summary'] = stripcslashes($function->FixQuotes($_POST['summary']));
                $data['Description'] = stripcslashes($function->FixQuotes($_POST['description']));
                $data['Act'] = stripcslashes($function->FixQuotes($_POST['act']));
                $good = $oModule->moduleUpdate($id, $data);
                if($good) {
                    return $function->msg_box("Đã cập nhật thành công!<br /><a href='?module=module'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=module",1);
                } else return $function->msg_box("Có lỗi xảy ra trong quá trình thực hiện. Xin vui lòng thử lại!<br /><a href='?module=module&a=update&id='".$id.">(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=module&a=update&id=".$id,3);
            } else {
                $id = intval($_GET['id']);
                $detail = $oModule->moduleLoad($id);
                $smarty->assign("detail", $detail);
                return $smarty->fetch("module/module_update.html");
            }
            break;

        case "delete":
            $check = $_POST['check_del'];
            foreach($check as $checked) {
                $id = intval($checked);
                $oModule->moduleDelete($id);
            }
            return $function->msg_box("Đã xóa thành công!<br /><a href='?module=module'>(Nhấp chuột vào đây nếu cảm thấy đợi lâu)</a>",10,"?module=module",1);
            break;
    }
}