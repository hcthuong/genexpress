<?php

class Functions{

function Functions(){
	}
function msg_box($str, $time, $link,$type){
	global $smarty;
	$smarty->assign("thongbao", $str);
	$smarty->assign("time", $time);
	$smarty->assign("goto", $link);
	$smarty->assign("type", $type);
	return $smarty->fetch("msgbox.html");
}
function msg_box_client($template,$str, $time, $link){
	global $smarty;
	$smarty->assign("thongbao", $str);
	$smarty->assign("time", $time);
	$smarty->assign("goto", $link);
	return $smarty->fetch($template."/msgbox.html");
}
function goto_url($url){
	echo '
	<script language="javascript">
	window.location="'.$url.'";
	</script>';
}
function goto_url_open($url){
	echo '
	<script language="javascript">
	window.open("'.$url.'","Window1","menubar=no,width=430,height=360,toolbar=no");
	</script>';
}
function FixQuotes ($what = "") {
	$what = preg_replace("/'/","/''/",$what);
	while (preg_match("/\\\\'/", $what)){
	$what = preg_replace("/\\\\'/","'",$what);
	}
	return $what;
}

function check_html($str, $strip=""){
	/* The core of this code has been lifted from phpslash */
	/* which is licenced under the GPL. */
	if ($strip == "nohtml")
		$AllowableHTML=array('');
		$str = stripslashes($str);
		$str = eregi_replace("<[[:space:]]*([^>]*)[[:space:]]*>",'<\\1>', $str);
	// Delete all spaces from html tags .
		$str = eregi_replace("<a[^>]*href[[:space:]]*=[[:space:]]*\"?[[:space:]]*([^\" >]*)[[:space:]]*\"?[^>]*>",'<a href="\\1">', $str);
	// Delete all attribs from Anchor, except an href, double quoted.
		$str = eregi_replace("<[[:space:]]* img[[:space:]]*([^>]*)[[:space:]]*>", '', $str);
	// Delete all img tags
		$str = eregi_replace("<a[^>]*href[[:space:]]*=[[:space:]]*\"?javascript[[:punct:]]*\"?[^>]*>", '', $str);
	// Delete javascript code from a href tags -- Zhen-Xjell @ http://nukecops.com
		$tmp = "";
		while (ereg("<(/?[[:alpha:]]*)[[:space:]]*([^>]*)>",$str,$reg)) {
			$i = strpos($str,$reg[0]);
			$l = strlen($reg[0]);
			if ($reg[1][0] == "/") $tag = strtolower(substr($reg[1],1));
			else $tag = strtolower($reg[1]);
			if ($a = $AllowableHTML[$tag])
			if ($reg[1][0] == "/") $tag = "</$tag>";
			elseif (($a == 1) || ($reg[2] == "")) $tag = "<$tag>";
			else {
		# Place here the double quote fix function.
			$attrb_list=delQuotes($reg[2]);
		// A VER
			$attrb_list = ereg_replace("&","&amp;",$attrb_list);
			$tag = "<$tag" . $attrb_list . ">";
			} # Attribs in tag allowed
		else $tag = "";
		$tmp .= substr($str,0,$i) . $tag;
		$str = substr($str,$i+$l);
		}
		$str = $tmp . $str;
		return $str;
		exit;
	/* Squash PHP tags unconditionally */
		$str = ereg_replace("<\?","",$str);
		return $str;
}
function to_character($var){
	$a = array('â','ấ','ầ','ẩ','ẫ','ậ','ă','ắ','ằ','ẳ','ẵ','ặ','á','à','ả','ã','ạ');
	$o = array('ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ','ó','ò','ỏ','õ','ọ');
	$u = array('ư','ứ','ừ','ử','ữ','ự','ú','ù','ủ','ũ','ụ');
	$i_char = array('í','ì','ỉ','ĩ','ị');
	$e = array('ê','ế','ề','ể','ễ','ệ','é','è','ẻ','ẽ','ẹ');
	$y = array('ý','ỳ','ỷ','ỹ','ỵ');	
	
	$A = array('Â','Ấ','Ầ','Ẩ','Ẫ','Ậ','Ă','Ắ','Ằ','Ẳ','Ẵ','Ặ','Á','À','Ả','Ã','Ạ');
	$O = array('Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ','Ó','Ò','Ỏ','Õ','Ọ');
	$U = array('Ư','Ứ','Ừ','Ử','Ữ','Ự','Ú','Ù','Ủ','Ũ','Ụ');
	$I_char = array('Í','Ì','Ỉ','Ĩ','Ị');
	$E = array('Ê','Ế','Ề','Ể','Ễ','Ệ','É','È','Ẻ','Ẽ','Ẹ');
	$Y = array('Ý','Ỳ','Ỷ','Ỹ','Ỵ');

	 for($i=0;$i<count($a);$i++){
		 $var =  str_replace($a[$i],"a",$var);
	 }
	 for($i=0;$i<count($o);$i++){
		 $var =  str_replace($o[$i],"o",$var);
	 }
	 for($i=0;$i<count($u);$i++){
		 $var =  str_replace($u[$i],"u",$var);
	 }
	 for($i=0;$i<count($i_char);$i++){
		 $var =  str_replace($i_char[$i],"i",$var);
	 }
	 for($i=0;$i<count($e);$i++){
		 $var =  str_replace($e[$i],"e",$var);
	 }
	 for($i=0;$i<count($y);$i++){
		 $var =  str_replace($y[$i],"y",$var);
	 }
	 for($i=0;$i<count($A);$i++){
		 $var =  str_replace($A[$i],"a",$var);
	 }
	 for($i=0;$i<count($O);$i++){
		 $var =  str_replace($O[$i],"o",$var);
	 }
	 for($i=0;$i<count($U);$i++){
		 $var =  str_replace($U[$i],"u",$var);
	 }
	 for($i=0;$i<count($I_char);$i++){
		 $var =  str_replace($I_char[$i],"i",$var);
	 }
	 for($i=0;$i<count($E);$i++){
		 $var =  str_replace($E[$i],"e",$var);
	 }
	 for($i=0;$i<count($Y);$i++){
		 $var =  str_replace($Y[$i],"y",$var);
	 }
	 $var =  str_replace("đ","d",$var) ;
	 $var =  str_replace("Đ","d",$var) ;	

	 return  str_replace(" ","_",preg_replace("/[^A-Za-z0-9_]/", " ", strtolower($var)));
}

function cutnchar($str,$n){
	if(strlen($str)<$n) return $str;
	$html    = substr($str,0,$n);
	$html    = substr($html,0,strrpos($html,' '));
	return $html.'...';
}
function generate_page($base_url, $num_items, $per_page, $start_item, $add_prevnext_text = TRUE) {
	$total_pages = ceil($num_items/$per_page);
	if ($total_pages == 1) { return ''; }
	@$on_page = floor($start_item / $per_page) + 1;
	$page_string = '';
	if($total_pages > 10) {
		$init_page_max = ($total_pages > 3) ? 3 : $total_pages;
		for($i = 1; $i < $init_page_max + 1; $i++) {
			$page_string .= ($i == $on_page) ? '<b>'.$i.'</b>' : '<a class="text_12_b" href="'.$base_url."&page=".($i - 1) * $per_page.'">'.$i.'</a>';
			if ($i <  $init_page_max) { $page_string .= " "; }
		}
		if ($total_pages > 3) {
			if ($on_page > 1  && $on_page < $total_pages) {
				$page_string .= ($on_page > 5) ? ' ... ' : ' ';
				$init_page_min = ($on_page > 4) ? $on_page : 5;
				$init_page_max = ($on_page < $total_pages - 4) ? $on_page : $total_pages - 4;
				for($i = $init_page_min - 1; $i < $init_page_max + 2; $i++) {
					$page_string .= ($i == $on_page) ? '<b>'.$i.'</b>' : '<a class="text_12_b" href="'.$base_url. "&page=" .($i - 1) * $per_page.'">'.$i.'</a>';
					if ($i <  $init_page_max + 1) { $page_string .= ' '; }
				}
				$page_string .= ($on_page < $total_pages - 4) ? ' ... ' : ' ';
			}
			else { $page_string .= ' ... '; }
			for($i = $total_pages - 2; $i < $total_pages + 1; $i++) {
				$page_string .= ($i == $on_page) ? '<b>'.$i.'</b>'  : '<a class="text_12_b" href="'.$base_url. "&page=" .($i - 1) * $per_page.'">'.$i.'</a>';
				if( $i <  $total_pages ) { $page_string .= " "; }
			}
		}
	}else{
		for($i = 1; $i < $total_pages + 1; $i++) {
			$page_string .= ($i == $on_page) ? '<b>'.$i.'</b>' : '<a class="text_12_b" href="'.$base_url. "&page=" .($i - 1) * $per_page.'">'.$i.'</a>';
			if ($i <  $total_pages) { $page_string .= ' '; }
		}
	}
	if ($add_prevnext_text){
		if ($on_page == 1){
			$page_string = ' <span class="text_12_b">&laquo;&nbsp;'.PREVIOUS_PAGE.' |&nbsp;&nbsp;' . '<b>'.PAGE.'</b>&nbsp;</span>'. $page_string;
		}
		if ($on_page > 1) {
			$page_string = ' <a class="text_12_b" href="'.$base_url. "&page=" . ($on_page - 2) * $per_page.'">&laquo;&nbsp;'.PREVIOUS_PAGE.' |</a>&nbsp;&nbsp;' . '<font class="text_12_b"><b>'.PAGE.'</b></font>&nbsp;'. $page_string;
		}
		if ($on_page < $total_pages) {
			$page_string .= '&nbsp;&nbsp;<a class="text_12_b" href="'.$base_url. "&page=" .$on_page * $per_page.'">| '.NEXT_PAGE.'&nbsp;&raquo;</a>';
		}elseif ($on_page == $total_pages){
			$page_string .= '&nbsp;&nbsp;<span class="text_12_b">| '.NEXT_PAGE.'&nbsp;&raquo;</span>';	
		}
	}
	return $page_string;
}

function generate_page_client($base_url, $num_items, $per_page, $start_item, $add_prevnext_text = TRUE) {
	$total_pages = ceil($num_items/$per_page);
	if ($total_pages == 1) { return ''; }
	@$on_page = floor($start_item / $per_page) + 1;
	$page_string = '';
	if($total_pages > 10) {
		$init_page_max = ($total_pages > 3) ? 3 : $total_pages;
		for($i = 1; $i < $init_page_max + 1; $i++) {
			$page_string .= ($i == $on_page) ? '<b>'.$i.'</b>' : '<a href="'.$base_url."/paging".($i - 1) * $per_page.'.html">'.$i.'</a>';
			if ($i <  $init_page_max) { $page_string .= " "; }
		}
		if ($total_pages > 3){
			if ($on_page > 1  && $on_page < $total_pages) {
				$page_string .= ($on_page > 5) ? ' ... ' : ' ';
				$init_page_min = ($on_page > 4) ? $on_page : 5;
				$init_page_max = ($on_page < $total_pages - 4) ? $on_page : $total_pages - 4;
				for($i = $init_page_min - 1; $i < $init_page_max + 2; $i++) {
					$page_string .= ($i == $on_page) ? '<b>'.$i.'</b>' : '<a href="'.$base_url. "/paging" .($i - 1) * $per_page.'.html">'.$i.'</a>';
					if ($i <  $init_page_max + 1) { $page_string .= ' '; }
				}
				$page_string .= ($on_page < $total_pages - 4) ? ' ... ' : ' ';
			}
			else { $page_string .= ' ... '; }
			for($i = $total_pages - 2; $i < $total_pages + 1; $i++) {
				$page_string .= ($i == $on_page) ? '<b>'.$i.'</b>'  : '<a href="'.$base_url. "/paging" .($i - 1) * $per_page.'.html">'.$i.'</a>';
				if( $i <  $total_pages ) { $page_string .= " "; }
			}
		}
	}else{
		for($i = 1; $i < $total_pages + 1; $i++) {
			$page_string .= ($i == $on_page) ? '<b>'.$i.'</b>' : '<a href="'.$base_url. "/paging" .($i - 1) * $per_page.'.html">'.$i.'</a>';
			if ($i <  $total_pages) { $page_string .= ' '; }
		}
	}
	if ($add_prevnext_text) {
		if ($on_page == 1){
			$page_string = ' <span class="text_12_b">&laquo;&nbsp;'.PREVIOUS_PAGE.' |&nbsp;&nbsp;' . '<b>'.PAGE.'</b>&nbsp;</span>'. $page_string;
		}
		if ($on_page > 1) {
			$page_string = ' <a href="'.$base_url. "/paging" . ($on_page - 2) * $per_page.'.html">&laquo;&nbsp;'.PREVIOUS_PAGE.' |</a>&nbsp;&nbsp;' . '<font class="text_12_b"><b>'.PAGE.'</b></font>&nbsp;'. $page_string;
		}
		if ($on_page < $total_pages) {
			$page_string .= '&nbsp;&nbsp;<a href="'.$base_url. "/paging" .$on_page * $per_page.'.html">| '.NEXT_PAGE.' &raquo;</a>';
		}elseif ($on_page == $total_pages){
				$page_string .= '&nbsp;&nbsp;<span class="text_12_b">| '.NEXT_PAGE.'&nbsp;&raquo;</span>';
		}
	}
	return $page_string;
}

//Phan trang = ajiax
function generate_page_ajax($base_url, $num_items, $per_page, $start_item, $type = 0, $add_prevnext_text = TRUE) {
	$total_pages = ceil($num_items/$per_page);
	if ($total_pages == 1) { return ''; }
	@$on_page = floor($start_item / $per_page) + 1;
	$page_string = '';
	if($total_pages > 10) {
		$init_page_max = ($total_pages > 3) ? 3 : $total_pages;
		for($i = 1; $i < $init_page_max + 1; $i++) {
			$page_string .= ($i == $on_page) ? '<b>'.$i.'</b>' : '<a href="javascript:void(0);" onclick="asearch_page('.$type.','.($i - 1) * $per_page.')">'.$i.'</a>';
			if ($i <  $init_page_max) { $page_string .= " "; }
		}
		if ($total_pages > 3) {
			if ($on_page > 1  && $on_page < $total_pages) {
				$page_string .= ($on_page > 5) ? ' ... ' : ' ';
				$init_page_min = ($on_page > 4) ? $on_page : 5;
				$init_page_max = ($on_page < $total_pages - 4) ? $on_page : $total_pages - 4;
				for($i = $init_page_min - 1; $i < $init_page_max + 2; $i++) {
					$page_string .= ($i == $on_page) ? '<b>'.$i.'</b>' : '<a href="javascript:void(0);" onclick="asearch_page('.$type.','.($i - 1) * $per_page.')">'.$i.'</a>';
					if ($i <  $init_page_max + 1) { $page_string .= ' '; }
				}
				$page_string .= ($on_page < $total_pages - 4) ? ' ... ' : ' ';
			}
			else { $page_string .= ' ... '; }
			for($i = $total_pages - 2; $i < $total_pages + 1; $i++) {
				$page_string .= ($i == $on_page) ? '<b>'.$i.'</b>'  : '<a href="javascript:void(0);" onclick="asearch_page('.$type.','.($i - 1) * $per_page.')">'.$i.'</a>';
				if( $i <  $total_pages ) { $page_string .= " "; }
			}
		}
	}else{
		for($i = 1; $i < $total_pages + 1; $i++) {
			$page_string .= ($i == $on_page) ? '<b>'.$i.'</b>' : '<a href="javascript:void(0);" onclick="asearch_page('.$type.','.($i - 1) * $per_page.')">'.$i.'</a>';
			if ($i <  $total_pages) { $page_string .= ' '; }
		}
	}
	if ($add_prevnext_text) {
		if ($on_page == 1){
			$page_string = ' <span class="txt_11_grey">&laquo;&nbsp;'.PREVIOUS.'</span> |&nbsp;&nbsp;' . '<b>'.PAGE.'</b>&nbsp;'. $page_string;
		}
		if ($on_page > 1) {
			$page_string = ' <a class="txt_11_grey" href="javascript:void(0);" onclick="asearch_page('.$type.','.($on_page - 2) * $per_page.')">&laquo;&nbsp;'.PREVIOUS.'</a> |&nbsp;&nbsp;' . '<b>'.PAGE.'</b>&nbsp;'. $page_string;
		}
		if ($on_page < $total_pages) {
			$page_string .= '&nbsp;&nbsp;| <a class="txt_11_grey" href="javascript:void(0);" onclick="asearch_page('.$type.','.$on_page * $per_page.')">'.NEXT.'&nbsp;&raquo;</a>';
		}elseif ($on_page == $total_pages){
			$page_string .= '&nbsp;&nbsp;<span class="txt_11_grey">| '.NEXT.'&nbsp;&raquo;</span>';   
		}
	}
	return $page_string;
	}
//Ket thuc phan trang = ajax
function isValidEmail($string){
	if (preg_match("/^\w(\.?[\w-])*@\w(\.?[-\w])*\.[a-z]{2,4}$/i", $string)) {
		return true;
	} else {
		return false;
	}
}
function chars_rand($length){
	$keychars = "aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWxXyYzZ123456789";
	$randkey = "";
	$randkey_space = "";
	for ($i=0; $i < $length; $i++){
		$a = substr($keychars, rand(1, strlen($keychars)-1 ), 1);
		$randkey .= $a;
		$randkey_space .= " ".$a;
	}
	return  $randkey;
} 

function finland_number_format($number_in,$s = 0) {
//$s = 0; // 2 => co 2 so duoi sau dau phay
	$number = number_format($number_in,$s,",",".");
	$number_out = str_replace(".",",",$number);
	return $number_out;
}

function khoangcachngay($p_strngay1,$p_strngay2,$p_strkieu = 'ngay'){
	$m_arrngay1 = explode('/',$p_strngay1);
	$m_arrngay2 = explode('/',$p_strngay2);
	$m_intngay1 = mktime(0,0,0,$m_arrngay1[1],$m_arrngay1[0],$m_arrngay1[2]);
	$m_intngay2 = mktime(0,0,0,$m_arrngay2[1],$m_arrngay2[0],$m_arrngay2[2]);
	$m_int = abs($m_intngay1 - $m_intngay2);
	switch ($p_strkieu){
		case 'ngay': $m_int /= 86400;break;
		case 'gio' : $m_int /= 3600;break;
		case 'phut': $m_int /= 60;break;
		default : break;
	}
	return $m_int;
}

function array_remove($arr,$value) {
	return array_values(array_diff($arr,array($value)));
}
function printTree($dir, $i=0) {
	$array = array();
	$d = dir($dir);
	while (false !== ($entry = $d->read())){
    	if($entry!='.' && $entry!='..'){
		$array[] = $entry;}
   	}
	$d->close();
	return $array;
}
function download_file($filename,$template,$catid,$download_id){	
	$aryFile = explode('.', $filename);
	$file_extension = $aryFile[count($aryFile)-1];
	if ($fd = fopen ($filename, "r")) {
	$fsize = filesize($filename);
	//$path_parts = pathinfo($filename);
	//$ext = file_extension;
	switch ($file_extension) {
		case "pdf": $ctype="application/pdf"; break;
		case "exe": $ctype="application/octet-stream"; break;
		case "zip": $ctype="application/zip"; break;
		case "rar": $ctype="application/x-rar-compressed"; break;
		case "doc": $ctype="application/msword"; break;
		case "xls": $ctype="application/vnd.ms-excel"; break;
		case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
		case "gif": $ctype="image/gif"; break;
		case "png": $ctype="image/png"; break;
		case "jpeg":
		case "jpg": $ctype="image/jpg"; break;
		default: $ctype="application/force-download";
	}

	header("Content-type: $ctype"); // add here more headers for diff. extensions
	header("Content-Disposition: filename=\"".basename($filename)."\"");
	header("Content-length: $fsize");
	header("Cache-control: public"); //use this to open files directly
	while(!feof($fd)) {
	$buffer = fread($fd, 2048);
	echo $buffer;
	}
	}
	//fclose ($fd);
}
// ensure $dir ends with a slash
function delTree($dir) {
    $files = glob( $dir . '*', GLOB_MARK );
    foreach( $files as $file ){
        if( substr( $file, -1 ) == '/' )
            delTree( $file );
        else
            unlink( $file );
    }
    rmdir( $dir );
}
function check_liscen(){
	include("text.php");
	include($_SERVER['DOCUMENT_ROOT']."/module/ancrypt/ANCrypt.class.php");
	$ancrypt = new ANCrypt($key);
	if($ancrypt->decrypt($ip) != $_SERVER['SERVER_ADDR']){exit;}else{$info['data']['ip'] = $ancrypt->decrypt($ip);}
	if($ancrypt->decrypt($domain) != $_SERVER["SERVER_NAME"]){exit;}else{$info['data']['domain'] = $ancrypt->decrypt($domain);}
	$info['data']['dbn'] = $ancrypt->decrypt($dbn);
	$info['data']['dbu'] = $ancrypt->decrypt($dbu);
	$info['data']['dbp'] = $ancrypt->decrypt($dbp);
	if($ancrypt->decrypt($time) < time()){exit;}else{$info['data']['time'] = $ancrypt->decrypt($time);}	
	return $info;
	}
}
?>
