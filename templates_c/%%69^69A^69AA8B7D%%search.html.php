<?php /* Smarty version 2.6.13, created on 2013-09-04 09:03:33
         compiled from default/product/search.html */ ?>
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
				<div class="frame_product" align="center">
                	<h2><span><?php echo $this->_tpl_vars['cat_title']['Category_Name']; ?>
</span></h2>
                    <table border="0" width="90%" cellpadding="10" cellspacing="5" style="border-collapse:collapse">
                    	<?php unset($this->_sections['ls']);
$this->_sections['ls']['name'] = 'ls';
$this->_sections['ls']['loop'] = is_array($_loop=$this->_tpl_vars['ls']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ls']['show'] = true;
$this->_sections['ls']['max'] = $this->_sections['ls']['loop'];
$this->_sections['ls']['step'] = 1;
$this->_sections['ls']['start'] = $this->_sections['ls']['step'] > 0 ? 0 : $this->_sections['ls']['loop']-1;
if ($this->_sections['ls']['show']) {
    $this->_sections['ls']['total'] = $this->_sections['ls']['loop'];
    if ($this->_sections['ls']['total'] == 0)
        $this->_sections['ls']['show'] = false;
} else
    $this->_sections['ls']['total'] = 0;
if ($this->_sections['ls']['show']):

            for ($this->_sections['ls']['index'] = $this->_sections['ls']['start'], $this->_sections['ls']['iteration'] = 1;
                 $this->_sections['ls']['iteration'] <= $this->_sections['ls']['total'];
                 $this->_sections['ls']['index'] += $this->_sections['ls']['step'], $this->_sections['ls']['iteration']++):
$this->_sections['ls']['rownum'] = $this->_sections['ls']['iteration'];
$this->_sections['ls']['index_prev'] = $this->_sections['ls']['index'] - $this->_sections['ls']['step'];
$this->_sections['ls']['index_next'] = $this->_sections['ls']['index'] + $this->_sections['ls']['step'];
$this->_sections['ls']['first']      = ($this->_sections['ls']['iteration'] == 1);
$this->_sections['ls']['last']       = ($this->_sections['ls']['iteration'] == $this->_sections['ls']['total']);
?>
                        <tr>
                        	<td width="120"><img border="1" src="<?php echo @URL_HOMEPAGE; ?>
/upload/product_thumb/<?php echo $this->_tpl_vars['ls'][$this->_sections['ls']['index']]['Image_Name']; ?>
" width="118" height="78" /></td>
                            <td width="150" style="padding-left: 5px;" valign="top"><b><?php echo $this->_tpl_vars['ls'][$this->_sections['ls']['index']]['Product_Name']; ?>
</b><br /><?php echo $this->_tpl_vars['ls'][$this->_sections['ls']['index']]['Description']; ?>
<br /><?php echo @_PRICE; ?>
: <?php echo $this->_tpl_vars['ls'][$this->_sections['ls']['index']]['Price']; ?>
 <?php echo @_CURRENCY; ?>
</td>
                            <td ><select id="qtt<?php echo $this->_tpl_vars['ls'][$this->_sections['ls']['index']]['Product_ID']; ?>
" style="width: 50px" name="quantity" onchange="get_quantity(<?php echo $this->_tpl_vars['ls'][$this->_sections['ls']['index']]['Product_ID']; ?>
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
                            <td class="pro"><a id="link<?php echo $this->_tpl_vars['ls'][$this->_sections['ls']['index']]['Product_ID']; ?>
" href="<?php echo @URL_HOMEPAGE; ?>
/product/basket/<?php echo $_GET['catid']; ?>
/1/<?php echo $this->_tpl_vars['ls'][$this->_sections['ls']['index']]['Product_ID']; ?>
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