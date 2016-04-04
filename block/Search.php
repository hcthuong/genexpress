<?php
	global $db,$smarty,$function,$template,$module;
	$content = '';
	$module_s = 'product';
	$oCategory = new Category;
	$rs = $oCategory->show_all_parent_category(1,'product','Category_Name','asc',0,0);
	$content .= '<form method="post" name="frm_search" action="'.URL_HOMEPAGE.'/'.$module_s.'/search.html" enctype="multipart/form-data" onSubmit="return check_value_search(frm_search);">';
	$content .= '<p>T&igrave;m theo gi&aacute;:';
	$content .= '<select name="slt_price" id="DropDownList1" class="ComboBoxFind">
				<option value="0">'._CHOOSE.' (&#272;vt ngh&igrave;n VN&#272;  )</option>
				<option value="0-500000"> < 500</option>
                <option value="500000-1000000">>500 -> 1000</option>
                <option value="1000000-2000000">>1000 - 2000</option>
				<option value="2000000-5000000">>2000 - 5000</option>
				<option value="5000000">>5000</option>
                </select><BR /><br />Ch&#7885;n danh m&#7909;c:&nbsp;&nbsp;';
	$content .= '<select name="slt_category" id="DropDownList1" class="ComboBoxFind">   
					<option value="0">'._CHOOSE.'</option>';
	for($i=0;$i<count($rs);$i++){ 
		$sub[$i] = $oCategory->show_all_product_sub_category('product',$rs[$i]['Category_ID'],'Category_Name','asc');
		if(count($sub[$i]) == 0){
			$content .= '<option value="'.$rs[$i]['Category_ID'].'">'.$rs[$i]['Category_Name'].'</option>';
		}else{
			$content .= '<option value="'.$rs[$i]['Category_ID'].'">'.$rs[$i]['Category_Name'].'</option>';
			for($j=0;$j<count($sub[$i]);$j++){
				$content .= '<option value="'.$rs[$i]['Category_ID'].'">&nbsp;&nbsp;|-&nbsp;'.$sub[$i][$j]['Category_Name'].'</option>';
			}
		}
	}
	$content .= '</select>';
	$content .= '<input type="submit" name="search" id="Image1" value="" class="search-bt" style="vertical-align: middle; margin-left: 5px;"/></p>';
	$content .= '</form>';
	return $content;
?>