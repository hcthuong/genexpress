<?php /* Smarty version 2.6.13, created on 2014-04-08 11:05:57
         compiled from product/product_manager.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'product/product_manager.html', 70, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
function setCheckboxes(the_form, do_check)
{
    var elts      = (typeof(document.forms[the_form].elements[\'product_del[]\']) != \'undefined\')
                  ? document.forms[the_form].elements[\'product_del[]\']
                  : 0;
    var elts_cnt  = (typeof(elts.length) != \'undefined\')
                  ? elts.length
                  : 0;

    if (elts_cnt) {
        for (var i = 0; i < elts_cnt; i++) {
            elts[i].checked = do_check;
        }
    } else {
        elts.checked = do_check;
    }
return true; 
}
function allcheck_uncheck(the_form){
	if (document.getElementById(\'all\').checked === true){
		 setCheckboxes(the_form, true);
	}
	else
	{
		setCheckboxes(the_form, false);
	}
}
function MM_jumpMenu(targ,selObj,restore){ //v3.0 
	eval(targ+".location=\'"+selObj.options[selObj.selectedIndex].value+"\'"); if 
	(restore) selObj.selectedIndex=0; } //-->
</script>
'; ?>

<div id="bgwrap">		
				<!-- Main Content -->
				<div id="content">
					<div id="main">
						<h1>Danh s&aacute;ch s&#7843;n ph&#7849;m</h1>        
				<?php if ($this->_tpl_vars['product_list']): ?>		
				<form name="frm_product" method="POST">
<div style="text-align:right"><input name="btnDelete" type="button" value="X&oacute;a" class="button" onClick="del_product('frm_product');" />
        <input name="btnAddNew" type="button" value="Th&ecirc;m" class="button" onClick="window.location='index.php?module=product&a=product_add'"/>
</div>				
				<table class="fullwidth" border="0" cellpadding="0" cellspacing="0"><tbody>
			  <thead><tr>    	
				<td width="15" align="center"><input type="checkbox" class="checkall" name="all" id="all"></td>
				<td><b>Hình </b></td>
				<td width="" align=""><b>Tên sản phẩm </b></td>
				<td width="" align=""><b>Thuộc danh mục</b></td>	
				<td align=""><strong>Gi&aacute;</strong></td>		
				<td width="80"><strong>Tr&#7841;ng th&aacute;i </strong></td>
				<td width="20"><strong>Hot?</strong></td>		
				  <td align=""><b>Thao t&aacute;c </b></td>	
			  </tr></thead>
			  <tr>
		<td colspan="8" align="right">
<select id="catid" name="catid" onChange="MM_jumpMenu('parent',this,0)">
				<option value="?module=product&a=product_manager">Ch&#7885;n danh m&#7909;c</option>
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
					<option value="?module=product&a=product_manager&catid=<?php echo $this->_tpl_vars['rs'][$this->_sections['rs']['index']]['Category_ID']; ?>
" style="background-color:#EEEEEE; font-weight:bold; font-family:Verdana, Arial, Helvetica, sans-serif;" <?php if ($this->_tpl_vars['category_id'] == $this->_tpl_vars['rs'][$this->_sections['rs']['index']]['Category_ID']): ?> selected="selected"<?php endif; ?>><b><?php echo $this->_tpl_vars['rs'][$this->_sections['rs']['index']]['Category_Name']; ?>
</b></option>										
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
						<option value="?module=product&a=product_manager&catid=<?php echo $this->_tpl_vars['sub'][$this->_sections['rs']['index']][$this->_sections['sub']['index']]['Category_ID']; ?>
" <?php if ($this->_tpl_vars['category_id'] == $this->_tpl_vars['sub'][$this->_sections['rs']['index']][$this->_sections['sub']['index']]['Category_ID']): ?> selected="selected"<?php endif; ?>>&nbsp;&nbsp;&nbsp;&nbsp;&brvbar;--&nbsp;<?php echo $this->_tpl_vars['sub'][$this->_sections['rs']['index']][$this->_sections['sub']['index']]['Category_Name']; ?>
</option>										
					<?php endfor; endif; ?>
				<?php endfor; endif; ?>
			</select>			
				</td>
	</tr>
			  <?php $_from = $this->_tpl_vars['product_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['product_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['product_list']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['product_list']):
        $this->_foreach['product_list']['iteration']++;
?>
 <tr bgcolor=<?php echo smarty_function_cycle(array('values' => "#FFFFFF,#EEEEEE"), $this);?>
>
 	<td width="21" align="center"><input type="checkbox" class="checkboxnut"name="product_del[]" value="<?php echo $this->_tpl_vars['product_list']['Product_ID']; ?>
" /></td>   
    <td align="center" width="<?php echo $this->_tpl_vars['resize_width']; ?>
px"><img src="<?php if ($this->_tpl_vars['product_list']['Image_Name'] != ''):  echo @URL_PRODUCT_THUMB;  echo $this->_tpl_vars['product_list']['Image_Name'];  else:  echo @URL_HOMEPAGE; ?>
/upload/no_image_50.jpg<?php endif; ?>" border="0" title="<?php echo $this->_tpl_vars['product_list']['Product_Name']; ?>
<br />Thời gian tạo: <?php echo $this->_tpl_vars['product_list']['Create_Time_Change']; ?>
 - Người tạo <?php echo $this->_tpl_vars['product_list']['Create_Name']; ?>
<br />Thời gian cập nhật: <?php echo $this->_tpl_vars['product_list']['Update_Time_Change']; ?>
 - Người cập nhật: <?php echo $this->_tpl_vars['product_list']['Update_Name']; ?>
" class="tooltip" width="<?php echo $this->_tpl_vars['resize_width']; ?>
px"/></td>
    <td title="<?php echo $this->_tpl_vars['product_list']['Product_Name']; ?>
<br />Thời gian tạo: <?php echo $this->_tpl_vars['product_list']['Create_Time_Change']; ?>
 - Người tạo <?php echo $this->_tpl_vars['product_list']['Create_Name']; ?>
<br />Thời gian cập nhật: <?php echo $this->_tpl_vars['product_list']['Update_Time_Change']; ?>
 - Người cập nhật: <?php echo $this->_tpl_vars['product_list']['Update_Name']; ?>
" class="tooltip" ><?php echo $this->_tpl_vars['product_list']['Product_Name']; ?>
</td>
    <td title="<?php echo $this->_tpl_vars['product_list']['Product_Name']; ?>
<br />Thời gian tạo: <?php echo $this->_tpl_vars['product_list']['Create_Time_Change']; ?>
 - Người tạo <?php echo $this->_tpl_vars['product_list']['Create_Name']; ?>
<br />Thời gian cập nhật: <?php echo $this->_tpl_vars['product_list']['Update_Time_Change']; ?>
 - Người cập nhật: <?php echo $this->_tpl_vars['product_list']['Update_Name']; ?>
" class="tooltip" ><?php echo $this->_tpl_vars['product_list']['Category_Name']; ?>
</td>	
	<td title="<?php echo $this->_tpl_vars['product_list']['Product_Name']; ?>
<br />Thời gian tạo: <?php echo $this->_tpl_vars['product_list']['Create_Time_Change']; ?>
 - Người tạo <?php echo $this->_tpl_vars['product_list']['Create_Name']; ?>
<br />Thời gian cập nhật: <?php echo $this->_tpl_vars['product_list']['Update_Time_Change']; ?>
 - Người cập nhật: <?php echo $this->_tpl_vars['product_list']['Update_Name']; ?>
" class="tooltip" ><?php if ($this->_tpl_vars['product_list']['Sale'] == 0):  if ($this->_tpl_vars['product_list']['Price'] == 0): ?>VNĐ<?php else:  echo $this->_tpl_vars['product_list']['Price']; ?>
&nbsp;VNĐ<?php endif;  else: ?><font style="text-decoration:line-through;"><?php echo $this->_tpl_vars['product_list']['Price']; ?>
&nbsp;VNĐ</font> | 
	<font color="#FF0000"><?php echo $this->_tpl_vars['product_list']['Sale']; ?>
&nbsp;VNĐ</font><?php endif; ?> </td>  	 
	<td width="" align="center" >
	<a href="?module=product&a=update_status&id=<?php echo $this->_tpl_vars['product_list']['Product_ID']; ?>
&status=<?php echo $this->_tpl_vars['product_list']['Status']; ?>
"><?php if ($this->_tpl_vars['product_list']['Status'] == 1): ?><img src="images/check.jpg" border="0" title="&#272;ang hi&#7875;n th&#7883;" alt="&#272;ang hi&#7875;n th&#7883;"  class="tooltip"><?php else: ?><img src="images/uncheck.png" border="0"  title="Kh&ocirc;ng hi&#7875;n th&#7883;" alt="Kh&ocirc;ng hi&#7875;n th&#7883;"  class="tooltip"><?php endif; ?></a>	</td>
	<td width="" align="center"> 
	<a href="?module=product&a=update_hot&id=<?php echo $this->_tpl_vars['product_list']['Product_ID']; ?>
&hot=<?php echo $this->_tpl_vars['product_list']['Hot']; ?>
"><?php if ($this->_tpl_vars['product_list']['Hot'] == 1): ?><img src="images/red_dot.gif" border="0" title="S&#7843;n ph&#7849;m ưa thích" alt="S&#7843;n ph&#7849;m ưa thích"  class="tooltip"><?php else: ?><img src="images/green_dot.gif" border="0"  title="S&#7843;n ph&#7849;m th&#432;&#7901;ng" alt="S&#7843;n ph&#7849;m th&#432;&#7901;ng"  class="tooltip"><?php endif; ?></a> </td>  
    <td align="center" width="">
	<a href="?module=product&a=product_edit&id=<?php echo $this->_tpl_vars['product_list']['Product_ID']; ?>
" class="tooltip" title="C&#7853;p nh&#7853;t s&#7843;n ph&#7849;m" alt="C&#7853;p nh&#7853;t s&#7843;n ph&#7849;m">Cập nhật</a>
	</td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>	
 <?php if ($this->_tpl_vars['paging']): ?>
 <tr><td align="center" colspan="9"><?php echo $this->_tpl_vars['paging']; ?>
</td></tr>
 <?php endif; ?>
 </tbody>
</table>
<div style="text-align:right"><input name="btnDelete" type="button" value="X&oacute;a" class="button" onClick="del_product('frm_product');" />
        <input name="btnAddNew" type="button" value="Th&ecirc;m" class="button" onClick="window.location='index.php?module=product&a=product_add'"/>
</div></form>
<?php else: ?>
	 <div class="message information">
	<h2>Thông báo</h2>
	<p>Hiện tại chưa có thông tin.<a href="?module=product"><i>Trở về &raquo;</i></a></p>
</div>
<?php endif; ?>
</div></div>
<?php echo '
	<script type="text/javascript" charset="utf-8">
function check_value(form)
{
	if(form.txtsearch.value=="")
	{
		form.onclick = $.prompt(\'Vui l&ograve;ng nh&#7853;p từ khóa!!!\');
		form.txtsearch.focus();
		return false;
	}		
}
	      
function del_product(frmName)
{
	var frm = document.forms[frmName];
	var items = document.getElementsByName("product_del[]");
	var enable = false;
	for (var i=0; i<items.length; i++)
	{
		if (items[i].checked==true)
		{
			enable = true;
			break;
		}
	}
		if (frm && enable)
			{
				$.prompt(\'B&#7841;n mu&#7889;n x&oacute;a s&#7843;n ph&#7849;m n&agrave;y?\',{ 
					buttons:{Ok:true, Cancel:false},
					callback: function(v,m){
				
					if(v){
					frm.action = "?module=product&a=product_delete";
					frm.submit();
					}
					else{}
					}
			});
	}
	else
		frm.onclick = $.prompt(\'B&#7841;n ch&#432;a ch&#7885;n s&#7843;n ph&#7849;m c&#7847;n x&oacute;a!!!\');		
	return false;
}
</script>
'; ?>
