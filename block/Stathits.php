<?php
	global $db,$smarty,$function;
	$content = '';
	$oQuickcount = new Quickcount();
	$count = $oQuickcount->show_count();

	$timecount = 86400;
	$client_ip = $_SERVER['REMOTE_ADDR'];
	$stats_time = time() - intval($timecount);
	$statcls = "";//so ip truy cap trong khoang thoi gian timecount
	$stathits1 = intval($count[2]);//tong so truy cap
	//if($count[1]!="") {
	//$statclients_ar = explode("|",$count[1]);
	//$m=0;
	//$statip[0] = "";
	//	for($l=0;$l < sizeof($statclients_ar);$l++) {
	//	$statclients_ar2 = explode(":",$statclients_ar[$l]);
	//	print_r($statclients_ar2[1]);echo '<br>';
	//		if(intval($statclients_ar2[1]) > $stats_time) {
	//			if($statcls != "") { $statcls .= "|"; }
	//			$statcls .= "".$statclients_ar[$l]."";
	//			$statip[$m] = $statclients_ar2[0];
	//			$m++;}
	//	}
		//$content = $statclients_ar2[1];
		/*if(!in_array($client_ip,$statip)){
			if($statcls != "") { $statcls .= "|"; }
			$statcls .= "".$client_ip.":".time()."";
			$stathits1++;
		}*/
	//}else{
		$statcls = "".$client_ip.":".time()."";
		$stathits1++;
	//}
	if($statcls!="$count[1]" || $stathits1!=$stathits){
	$oQuickcount->update_count($statcls,$stathits1);}
	$stathits1 = str_pad($stathits1, 7, "0", STR_PAD_LEFT);
	$content .= '<div class="thongke">';
	$content .= substr($stathits1,0,1)."&nbsp;&nbsp; ".substr($stathits1,1,1)."&nbsp;&nbsp;".substr($stathits1,2,1)."&nbsp;&nbsp;
			".substr($stathits1,3,1)."&nbsp;&nbsp; ".substr($stathits1,4,1)."&nbsp;&nbsp; ".substr($stathits1,5,1)."&nbsp;&nbsp;
			".substr($stathits1,6,1);
	$content .= '</div>';
	return $content;
?>