<?php /* Smarty version 2.6.13, created on 2013-07-11 08:38:13
         compiled from default/product/index.html */ ?>
<div id="content">
                	<div id="block">
           	    		<h6><img align="absmiddle" src="<?php echo @URL_HOMEPAGE; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/images/ico3.png" />&nbsp;&nbsp;<?php echo $this->_tpl_vars['module_title']; ?>
</h6>
                          <ul id="product">
						  	<?php $_from = $this->_tpl_vars['product_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['product_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['product_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['product_list']):
        $this->_foreach['product_list']['iteration']++;
?>
							<?php if ($this->_foreach['product_list']['iteration'] % 3 == 0): ?>
								<li>
							<?php elseif ($this->_foreach['product_list']['iteration'] % 3 == 1): ?>
								<li style="margin-left:15px;">
							<?php else: ?>
								<li style="margin-left:15px; margin-right:15px;">
							<?php endif; ?> 
							  <a href="<?php echo @URL_HOMEPAGE; ?>
/product/view/<?php echo $this->_tpl_vars['product_list']['Category_ID']; ?>
/<?php echo $this->_tpl_vars['product_list']['Product_ID']; ?>
/detail.html"><img class="pro" src="<?php echo @URL_PRODUCT_THUMB;  echo $this->_tpl_vars['product_list']['Image_Name']; ?>
" alt="" /></a>
                              <br /><a href="<?php echo @URL_HOMEPAGE; ?>
/product/view/<?php echo $this->_tpl_vars['product_list']['Category_ID']; ?>
/<?php echo $this->_tpl_vars['product_list']['Product_ID']; ?>
/detail.html"><?php echo $this->_tpl_vars['product_list']['Product_Name']; ?>
</a><br /><?php if ($this->_tpl_vars['product_list']['Sale'] != '' && $this->_tpl_vars['product_list']['Sale'] != 0): ?><span class="text14_sale"><?php echo $this->_tpl_vars['product_list']['Price']; ?>
</span> | <span class="text14"><?php echo $this->_tpl_vars['product_list']['Sale']; ?>
 VN&#272;</span><?php else: ?><span class="text14"><?php echo $this->_tpl_vars['product_list']['Price']; ?>
 VN&#272;</span><?php endif; ?><br />
                              <a href="<?php echo @URL_HOMEPAGE; ?>
/product/basket/<?php echo $this->_tpl_vars['product_list']['Product_ID']; ?>
.html"><img src="<?php echo @URL_HOMEPAGE; ?>
/templates/<?php echo $this->_tpl_vars['template']; ?>
/images/btn_dathang.jpg" /></a></li>
							 <?php endforeach; endif; unset($_from); ?>
							   <?php if ($this->_tpl_vars['paging']): ?><div class="linkpage"><?php echo $this->_tpl_vars['paging']; ?>
</div><?php endif; ?>
                          </ul>
                </div>
</div>