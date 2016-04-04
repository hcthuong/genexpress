<?php /* Smarty version 2.6.13, created on 2013-07-09 10:20:35
         compiled from default/index.html */ ?>
<?php echo '
<script language="javascript">
function get_quantity(id) {
	var url = '; ?>
 "<?php echo @URL_HOMEPAGE; ?>
"; <?php echo '
	var qty = $("#qtt"+id).val();
	$("#link" + id).attr("href", url + "/product/basket/0/" + qty + "/" + id + ".html");
}
</script>
'; ?>

			<div class="product">
				<h3><span> <?php echo @_MAIN_PRODUCT; ?>
 </span></h3>
				<div class="frame_product">
				<div class="product_left">
					<div class="image-additional" >
					  <ul class="jcarousel-skin-opencart">		
                        <?php unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['products']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                        <li><a href="<?php echo @URL_HOMEPAGE; ?>
/product/detail/<?php echo $this->_tpl_vars['products'][$this->_sections['p']['index']]['Product_ID']; ?>
/detail.html" title="colorbox" rel="colorbox"><img width="118" height="78" src="<?php echo @URL_HOMEPAGE; ?>
/upload/product_thumb/<?php echo $this->_tpl_vars['products'][$this->_sections['p']['index']]['Image_Name']; ?>
" alt="" title="<?php echo $this->_tpl_vars['products'][$this->_sections['p']['index']]['Product_Name']; ?>
" /></a></li>
                        <?php endfor; endif; ?>
                      </ul>
					</div>
				</div>
				<div class="product_right">
					<ul>
                        <?php unset($this->_sections['h']);
$this->_sections['h']['name'] = 'h';
$this->_sections['h']['loop'] = is_array($_loop=$this->_tpl_vars['hot_product']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['h']['show'] = true;
$this->_sections['h']['max'] = $this->_sections['h']['loop'];
$this->_sections['h']['step'] = 1;
$this->_sections['h']['start'] = $this->_sections['h']['step'] > 0 ? 0 : $this->_sections['h']['loop']-1;
if ($this->_sections['h']['show']) {
    $this->_sections['h']['total'] = $this->_sections['h']['loop'];
    if ($this->_sections['h']['total'] == 0)
        $this->_sections['h']['show'] = false;
} else
    $this->_sections['h']['total'] = 0;
if ($this->_sections['h']['show']):

            for ($this->_sections['h']['index'] = $this->_sections['h']['start'], $this->_sections['h']['iteration'] = 1;
                 $this->_sections['h']['iteration'] <= $this->_sections['h']['total'];
                 $this->_sections['h']['index'] += $this->_sections['h']['step'], $this->_sections['h']['iteration']++):
$this->_sections['h']['rownum'] = $this->_sections['h']['iteration'];
$this->_sections['h']['index_prev'] = $this->_sections['h']['index'] - $this->_sections['h']['step'];
$this->_sections['h']['index_next'] = $this->_sections['h']['index'] + $this->_sections['h']['step'];
$this->_sections['h']['first']      = ($this->_sections['h']['iteration'] == 1);
$this->_sections['h']['last']       = ($this->_sections['h']['iteration'] == $this->_sections['h']['total']);
?>
                        <li><a href="<?php echo @URL_HOMEPAGE; ?>
/product/detail/<?php echo $this->_tpl_vars['hot_product'][$this->_sections['h']['index']]['Product_ID']; ?>
/detail.html" class="img"><img width="43" height="32" src="<?php echo @URL_HOMEPAGE; ?>
/upload/product_thumb/<?php echo $this->_tpl_vars['hot_product'][$this->_sections['h']['index']]['Image_Name']; ?>
" alt="" title="<?php echo $this->_tpl_vars['hot_product'][$this->_sections['h']['index']]['Product_Name']; ?>
" /></a>
							<a href="<?php echo @URL_HOMEPAGE; ?>
/product/detail/<?php echo $this->_tpl_vars['hot_product'][$this->_sections['h']['index']]['Product_ID']; ?>
/detail.html" class="title"><?php echo $this->_tpl_vars['hot_product'][$this->_sections['h']['index']]['Product_Name']; ?>
</a>
							<select id="qtt<?php echo $this->_tpl_vars['hot_product'][$this->_sections['h']['index']]['Product_ID']; ?>
" name="quantity" onchange="get_quantity(<?php echo $this->_tpl_vars['hot_product'][$this->_sections['h']['index']]['Product_ID']; ?>
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
							</select>	
							<a id="link<?php echo $this->_tpl_vars['hot_product'][$this->_sections['h']['index']]['Product_ID']; ?>
" href="<?php echo @URL_HOMEPAGE; ?>
/product/basket/0/1/<?php echo $this->_tpl_vars['hot_product'][$this->_sections['h']['index']]['Product_ID']; ?>
.html" class="button"><span><?php echo @_TAKEIT; ?>
</span></a>
						</li>
                        <?php endfor; endif; ?>
					</ul>
				</div>
				</div>	
			</div>	
		 </div><!--End #main-->
		 <div class="bg_bottom"></div>