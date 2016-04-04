<?php /* Smarty version 2.6.13, created on 2013-07-09 10:19:38
         compiled from default/product/product_detail.html */ ?>
<?php echo '
<script language="javascript">
function get_quantity(id) {
	var pid = '; ?>
 <?php echo $_GET['pid']; ?>
; <?php echo '
	var url = '; ?>
 "<?php echo @URL_HOMEPAGE; ?>
"; <?php echo '
	var qty = $("#qtt"+id).val();
	$("#link" + id).attr("href", url + "/product/basket/" + catid + "/" + qty + "/" + id + ".html");
}
</script>
'; ?>

<div class="product">
				<h3><span> <?php echo @_PRODUCTS; ?>
 </span></h3>
				<div class="frame_product" align="center">
                	<h2><span><?php echo $this->_tpl_vars['cat_title']['Category_Name']; ?>
</span></h2>
                    <table border="0" width="90%" cellpadding="10" cellspacing="5" style="border-collapse:collapse">
                        <tr>
                        	<td width="120"><img border="1" src="<?php echo @URL_HOMEPAGE; ?>
/upload/product_thumb/<?php echo $this->_tpl_vars['detail']['Image_Name']; ?>
" width="118" height="78" /></td>
                            <td width="150" style="padding-left: 5px;" valign="top"><b><?php echo $this->_tpl_vars['detail']['Product_Name']; ?>
</b><br /><?php echo $this->_tpl_vars['detail']['Description']; ?>
<br /><?php echo @_PRICE; ?>
: <?php echo $this->_tpl_vars['detail']['Price']; ?>
 <?php echo @_CURRENCY; ?>
</td>
                            <td ><select id="qtt<?php echo $this->_tpl_vars['prod_cat'][$this->_sections['p']['index']]['Product_ID']; ?>
" style="width: 50px" name="quantity" onchange="get_quantity(<?php echo $this->_tpl_vars['detail']['Product_ID']; ?>
);">
								<option>0</option>
                                <option selected="selected">1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
                                <option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
                                <option>9</option>
								<option>10</option>
							</select></td>
                            <td class="pro"><a id="link<?php echo $this->_tpl_vars['detail']['Product_ID']; ?>
" href="<?php echo @URL_HOMEPAGE; ?>
/product/basket/<?php echo $_GET['pid']; ?>
/1/<?php echo $this->_tpl_vars['detail']['Product_ID']; ?>
.html" class="button"><span><?php echo @_TAKEIT; ?>
</span></a></td>
                        </tr>
                        <tr>
                        	<td colspan="4"><div style="height: 10px;">&nbsp;</div></td>
                        </tr>
                    </table>
    			</div>
                <div style="padding-bottom: 5px;" align="center"><?php echo $this->_tpl_vars['paging']; ?>
</div>
			</div>
		 </div><!--End #main-->
		 <div class="bg_bottom"></div>