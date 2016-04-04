<?php
	global $db,$smarty,$function,$template,$hot_line;
	$content = '';
	$oYahoo = new Yahoo;
	$str = $oYahoo->show_all_yahoo_client();
	$content .= '<p>';
	for($i=0;$i<count($str);$i++){
		$content .= '<b>'.$str[$i]['Fullname'].'</b><a href="ymsgr:sendIM?'.$str[$i]['Nick'].'" >
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="http://opi.yahoo.com/online?u='.$str[$i]['Nick'].'&amp;m=g&amp;t=2" border="0" alt="'.$str[$i]['Fullname'].'" title="'.$str[$i]['Fullname'].'"/>
		</a><br />';
	}
	$content .= ' <span style="font-size:18px; color:#900"><b>Hotline: '.$hot_line.'</b> </span></p>';
	return $content;
?>