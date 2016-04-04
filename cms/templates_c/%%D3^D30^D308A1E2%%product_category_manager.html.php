<?php /* Smarty version 2.6.13, created on 2014-04-11 19:07:36
         compiled from product/product_category_manager.html */ ?>
<div id="bgwrap">		
				<!-- Main Content -->
				<div id="content">
					<div id="main">
						<h1>Danh s&aacute;ch danh m&#7909;c</h1>        
				<?php if ($this->_tpl_vars['rs']): ?><form name="frm_product_category_manager" method="POST">
				<div style="text-align:right"><input name="btnAddNew" type="button" value="Th&ecirc;m danh mục" class="button" onClick="window.location='index.php?module=product&a=product_category_add'"/></div>				
				<table class="fullwidth" border="0" cellpadding="0" cellspacing="0"><tbody><thead><tr>    	
					<td><b>T&ecirc;n danh m&#7909;c </b></td>
					<td><b>Người tạo</b></td>
					<td><b>Thời gian tạo</b></td>	
					<td><b>Cập nhật</b></td>
					<td><b>Thời gian cập nhật</b></td>				
					<td><b>Thao t&aacute;c</b></td>			
			  	</tr></thead>
			 <?php unset($this->_sections['rs']);
$this->_sections['rs']['name'] = 'rs';
$this->_sections['rs']['loop'] = is_array($_loop=$this->_tpl_vars['rs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rs']['show'] = true;
$this->_sections['rs']['max'] = $this->_sections['rs']['loop'];
$this->_sections['rs']['step'] = 1;
$this->_sections['rs']['start'] = $this->_sections['rs']['step'] > 0 ? 0 : $this->_sections['rs']['loop']-1;
if ($this->_sections['rs']['show']) {
    $this->_sections['rs']['total'] = $this->_sections['rs']['loop'];
    if ($this->_sections['rs']['total'] == 0)
        $this->_sections['rs']['show'] = false;
} else
    $this->_sections['rs']['total'] = 0;
if ($this->_sections['rs']['show']):

            for ($this->_sections['rs']['index'] = $this->_sections['rs']['start'], $this->_sections['rs']['iteration'] = 1;
                 $this->_sections['rs']['iteration'] <= $this->_sections['rs']['total'];
                 $this->_sections['rs']['index'] += $this->_sections['rs']['step'], $this->_sections['rs']['iteration']++):
$this->_sections['rs']['rownum'] = $this->_sections['rs']['iteration'];
$this->_sections['rs']['index_prev'] = $this->_sections['rs']['index'] - $this->_sections['rs']['step'];
$this->_sections['rs']['index_next'] = $this->_sections['rs']['index'] + $this->_sections['rs']['step'];
$this->_sections['rs']['first']      = ($this->_sections['rs']['iteration'] == 1);
$this->_sections['rs']['last']       = ($this->_sections['rs']['iteration'] == $this->_sections['rs']['total']);
?>
 				<tr >
				<td><b><?php echo $this->_tpl_vars['rs'][$this->_sections['rs']['index']]['Category_Name']; ?>
</b></td>
				<td><?php echo $this->_tpl_vars['rs'][$this->_sections['rs']['index']]['Create_Name']; ?>
</td>
				<td><?php echo $this->_tpl_vars['rs'][$this->_sections['rs']['index']]['Create_Time_Change']; ?>
</td>
				<td><?php echo $this->_tpl_vars['rs'][$this->_sections['rs']['index']]['Update_Name']; ?>
</td>
				<td><?php echo $this->_tpl_vars['rs'][$this->_sections['rs']['index']]['Update_Time_Change']; ?>
</td>				    
				<td align="center" ><img border="0" src="images/icosua.gif" class="tooltip" alt="C&#7853;p nh&#7853;t danh m&#7909;c" title="C&#7853;p nh&#7853;t danh m&#7909;c"><a href="?module=product&a=product_category_edit&catid=<?php echo $this->_tpl_vars['rs'][$this->_sections['rs']['index']]['Category_ID']; ?>
" class="tooltip" alt="C&#7853;p nh&#7853;t danh m&#7909;c" title="C&#7853;p nh&#7853;t danh m&#7909;c"> Cập nhật</a>
				&nbsp;<img border="0" src="images/icodelete.gif" alt="X&oacute;a danh m&#7909;c" class="tooltip" title="X&oacute;a danh m&#7909;c"><a href="?module=product&a=product_category_delete&catid=<?php echo $this->_tpl_vars['rs'][$this->_sections['rs']['index']]['Category_ID']; ?>
" class="tooltip" alt="C&#7853;p nh&#7853;t danh m&#7909;c" title="C&#7853;p nh&#7853;t danh m&#7909;c"> Xóa</a>
			</td>
			  </tr> 
			  <?php unset($this->_sections['sub']);
$this->_sections['sub']['name'] = 'sub';
$this->_sections['sub']['loop'] = is_array($_loop=$this->_tpl_vars['sub'][$this->_sections['rs']['index']]) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sub']['show'] = true;
$this->_sections['sub']['max'] = $this->_sections['sub']['loop'];
$this->_sections['sub']['step'] = 1;
$this->_sections['sub']['start'] = $this->_sections['sub']['step'] > 0 ? 0 : $this->_sections['sub']['loop']-1;
if ($this->_sections['sub']['show']) {
    $this->_sections['sub']['total'] = $this->_sections['sub']['loop'];
    if ($this->_sections['sub']['total'] == 0)
        $this->_sections['sub']['show'] = false;
} else
    $this->_sections['sub']['total'] = 0;
if ($this->_sections['sub']['show']):

            for ($this->_sections['sub']['index'] = $this->_sections['sub']['start'], $this->_sections['sub']['iteration'] = 1;
                 $this->_sections['sub']['iteration'] <= $this->_sections['sub']['total'];
                 $this->_sections['sub']['index'] += $this->_sections['sub']['step'], $this->_sections['sub']['iteration']++):
$this->_sections['sub']['rownum'] = $this->_sections['sub']['iteration'];
$this->_sections['sub']['index_prev'] = $this->_sections['sub']['index'] - $this->_sections['sub']['step'];
$this->_sections['sub']['index_next'] = $this->_sections['sub']['index'] + $this->_sections['sub']['step'];
$this->_sections['sub']['first']      = ($this->_sections['sub']['iteration'] == 1);
$this->_sections['sub']['last']       = ($this->_sections['sub']['iteration'] == $this->_sections['sub']['total']);
?>
			 <tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&brvbar;--&nbsp;<?php echo $this->_tpl_vars['sub'][$this->_sections['rs']['index']][$this->_sections['sub']['index']]['Category_Name']; ?>
</td>
				<td><?php echo $this->_tpl_vars['sub'][$this->_sections['rs']['index']][$this->_sections['sub']['index']]['Create_Name']; ?>
</td>
				<td><?php echo $this->_tpl_vars['sub'][$this->_sections['rs']['index']][$this->_sections['sub']['index']]['Create_Time_Change']; ?>
</td>
				<td><?php echo $this->_tpl_vars['sub'][$this->_sections['rs']['index']][$this->_sections['sub']['index']]['Update_Name']; ?>
</td>
				<td><?php echo $this->_tpl_vars['sub'][$this->_sections['rs']['index']][$this->_sections['sub']['index']]['Update_Time_Change']; ?>
</td>						    	
				<td align="center"><img border="0" src="images/icosua.gif" alt="C&#7853;p nh&#7853;t danh m&#7909;c" title="C&#7853;p nh&#7853;t danh m&#7909;c"><a href="?module=product&a=product_category_edit&catid=<?php echo $this->_tpl_vars['sub'][$this->_sections['rs']['index']][$this->_sections['sub']['index']]['Category_ID']; ?>
" class="tooltip" style="text-decoration:none"> Cập nhật</a>
				&nbsp;<img border="0" src="images/icodelete.gif" alt="X&oacute;a danh m&#7909;c" title="X&oacute;a danh m&#7909;c"><a href="?module=product&a=product_category_delete&catid=<?php echo $this->_tpl_vars['sub'][$this->_sections['rs']['index']][$this->_sections['sub']['index']]['Category_ID']; ?>
" class="tooltip" style="text-decoration:none"> Xóa</a>
			</td>
			  </tr>  
			  <?php endfor; endif; ?>
			<?php endfor; endif; ?>
			 </tbody>
			</table>
<div style="text-align:right"><input name="btnAddNew" type="button" value="Th&ecirc;m danh mục" class="button" onClick="window.location='index.php?module=product&a=product_category_add'"/>
</div>
</form>
<?php else: ?>
	 <div class="message information">
	<h2>Thông báo</h2>
	<p>Hiện tại chưa có thông tin</p>
</div>
			<?php endif; ?>
</div></div>