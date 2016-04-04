<?php /* Smarty version 2.6.13, created on 2014-04-17 17:55:29
         compiled from default/product/cat.html */ ?>
<?php echo '
<script language="javascript">
function get_quantity(id) {
	var catid = '; ?>
 <?php echo $_GET['catid']; ?>
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
				<?php if ($this->_tpl_vars['infor_detail']['Title_r'] != ""): ?>
                <div class="frame_information" align="center">
                    <h2><span><?php echo @_ABOUTUS; ?>
</span></h2>
                    <table border="0" width="90%" cellpadding="10" cellspacing="5" style="border-collapse:collapse">
                        <tr>
                            <td width="120"><img border="1" src="<?php echo @URL_HOMEPAGE; ?>
/upload/news_thumb/<?php echo $this->_tpl_vars['infor_detail']['Image']; ?>
" width="120" /></td>
                            <td valign="top"><b><?php echo $this->_tpl_vars['infor_detail']['TitleInfor']; ?>
</b><br/><?php echo $this->_tpl_vars['infor_detail']['Summary']; ?>
</td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right"><a href="<?php echo @URL_HOMEPAGE; ?>
/information/detail/<?php echo $this->_tpl_vars['infor_detail']['Information_ID']; ?>
/<?php echo $this->_tpl_vars['infor_detail']['Title_r']; ?>
.html">(<?php echo @_MORE; ?>
)</a></td>
                        </tr>
                    </table>
				</div>
                <div class="frame_product" align="center">-------------------------------------------------------</div>
                <?php endif; ?>
                <div class="frame_product" align="center">
                	<h2><span><?php echo $this->_tpl_vars['cat_title']['Category_Name']; ?>
</span></h2>
                    <table border="0" width="90%" cellpadding="10" cellspacing="5" style="border-collapse:collapse">
                    	<?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['prod_cat']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['p']['show'] = true;
$this->_sections['p']['max'] = $this->_sections['p']['loop'];
$this->_sections['p']['step'] = 1;
$this->_sections['p']['start'] = $this->_sections['p']['step'] > 0 ? 0 : $this->_sections['p']['loop']-1;
if ($this->_sections['p']['show']) {
    $this->_sections['p']['total'] = $this->_sections['p']['loop'];
    if ($this->_sections['p']['total'] == 0)
        $this->_sections['p']['show'] = false;
} else
    $this->_sections['p']['total'] = 0;
if ($this->_sections['p']['show']):

            for ($this->_sections['p']['index'] = $this->_sections['p']['start'], $this->_sections['p']['iteration'] = 1;
                 $this->_sections['p']['iteration'] <= $this->_sections['p']['total'];
                 $this->_sections['p']['index'] += $this->_sections['p']['step'], $this->_sections['p']['iteration']++):
$this->_sections['p']['rownum'] = $this->_sections['p']['iteration'];
$this->_sections['p']['index_prev'] = $this->_sections['p']['index'] - $this->_sections['p']['step'];
$this->_sections['p']['index_next'] = $this->_sections['p']['index'] + $this->_sections['p']['step'];
$this->_sections['p']['first']      = ($this->_sections['p']['iteration'] == 1);
$this->_sections['p']['last']       = ($this->_sections['p']['iteration'] == $this->_sections['p']['total']);
?>
                        <tr>
                        	<td width="120"><img border="1" src="<?php echo @URL_HOMEPAGE; ?>
/upload/product_thumb/<?php echo $this->_tpl_vars['prod_cat'][$this->_sections['p']['index']]['Image_Name']; ?>
" width="118" height="78" /></td>
                            <td width="250" style="padding-left: 5px; font-size: 12px;" valign="top"><b><?php echo $this->_tpl_vars['prod_cat'][$this->_sections['p']['index']]['Product_Name']; ?>
</b><br /><?php echo $this->_tpl_vars['prod_cat'][$this->_sections['p']['index']]['Description']; ?>
<br /><?php echo @_PRICE; ?>
: <?php echo $this->_tpl_vars['prod_cat'][$this->_sections['p']['index']]['Price']; ?>
 <?php echo @_CURRENCY; ?>
</td>
                            <td ><select id="qtt<?php echo $this->_tpl_vars['prod_cat'][$this->_sections['p']['index']]['Product_ID']; ?>
" style="width: 50px" name="quantity" onchange="get_quantity(<?php echo $this->_tpl_vars['prod_cat'][$this->_sections['p']['index']]['Product_ID']; ?>
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
                            <td class="pro"><a id="link<?php echo $this->_tpl_vars['prod_cat'][$this->_sections['p']['index']]['Product_ID']; ?>
" href="<?php echo @URL_HOMEPAGE; ?>
/product/basket/<?php echo $_GET['catid']; ?>
/1/<?php echo $this->_tpl_vars['prod_cat'][$this->_sections['p']['index']]['Product_ID']; ?>
.html" class="button"><span><?php echo @_TAKEIT; ?>
</span></a></td>
                        </tr>
                        <tr>
                        	<td colspan="4"><div style="height: 10px;">&nbsp;</div></td>
                        </tr>
                        <?php endfor; endif; ?>
                    </table>
    			</div>
                <div style="padding-bottom: 5px;" align="center"><?php echo $this->_tpl_vars['paging']; ?>
</div>
			</div>
		 </div><!--End #main-->
		 <div class="bg_bottom"></div>