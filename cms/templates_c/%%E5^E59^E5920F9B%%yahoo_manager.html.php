<?php /* Smarty version 2.6.13, created on 2016-04-02 10:36:41
         compiled from yahoo/yahoo_manager.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'yahoo/yahoo_manager.html', 19, false),)), $this); ?>
<div id="bgwrap">		
				<!-- Main Content -->
				<div id="content">
					<div id="main">
						<h1>Danh sách hỗ trợ</h1>        
				<?php if ($this->_tpl_vars['rs']): ?>		
				<form name="frm_yahoo" method="POST">
<div style="text-align:right"><input name="btnDelete" type="button" value="X&oacute;a" class="button" onClick="del_yahoo('frm_yahoo');" />
        <input name="btnAddNew" type="button" value="Th&ecirc;m" class="button" onClick="window.location='index.php?module=yahoo&a=insert_yahoo'"/>
</div>	
				<table class="fullwidth" border="0" cellpadding="0" cellspacing="0"><tbody>
			  <thead><tr>    	
				<td width="21" align="center"><input type="checkbox" class="checkall" name="all" id="all" ></td>   
				<td width="" align=""><b>Nick</b></td>    
				<td width="" align=""><b>T&ecirc;n & Bộ phận hỗ trợ</b></td>    
				<td align=""><b>Thao t&aacute;c </b></td>			
			  </tr></thead>
			  <?php $_from = $this->_tpl_vars['rs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rs'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rs']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['rs']):
        $this->_foreach['rs']['iteration']++;
?>
				<tr bgcolor=<?php echo smarty_function_cycle(array('values' => "#FFFFFF,#EEEEEE"), $this);?>
>
				<td width="21" align="center"><input type="checkbox" class="checkboxnut"name="nick_del[]" value="<?php echo $this->_tpl_vars['rs']['Yahoo_ID']; ?>
" /></td>   
				<td><?php echo $this->_tpl_vars['rs']['Nick']; ?>
</td>         	
			 	<td><?php echo $this->_tpl_vars['rs']['Fullname']; ?>
</td>         		
				<td align="center" width="91"><a href="?module=yahoo&a=yahoo_edit&id=<?php echo $this->_tpl_vars['rs']['Yahoo_ID']; ?>
" class="function" style="text-decoration:none">Cập nhật</a></td>
			  </tr>
			  <?php endforeach; endif; unset($_from); ?>
				<?php if ($this->_tpl_vars['paging']): ?>
				<tr>
					<td style="border:none;" colspan="4" align="center"><?php echo $this->_tpl_vars['paging']; ?>
</td>
				</tr>
				<?php endif; ?>
 </tbody>
</table>
<div style="text-align:right"><input name="btnDelete" type="button" value="X&oacute;a" class="button" onClick="del_yahoo('frm_yahoo');" />
        <input name="btnAddNew" type="button" value="Th&ecirc;m" class="button" onClick="window.location='index.php?module=yahoo&a=insert_yahoo'"/>
</div>				</form>
<?php else: ?>
	 <div class="message information">
	<h2>Thông báo</h2>
	<p>Hiện tại chưa có thông tin</p>
</div>
			<?php endif; ?>
</div></div>
<?php echo '
	<script type="text/javascript" charset="utf-8">
	      
function del_yahoo(frmName)
{
	var frm = document.forms[frmName];
	var items = document.getElementsByName("nick_del[]");
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
				$.prompt(\'B&#7841;n mu&#7889;n x&oacute;a nick yahoo n&agrave;y?\',{ 
					buttons:{Ok:true, Cancel:false},
					callback: function(v,m){
				
					if(v){
					frm.action = "?module=yahoo&a=delete_yahoo";
					frm.submit();
					}
					else{}
					}
			});
	}
	else
		frm.onclick = $.prompt(\'B&#7841;n ch&#432;a ch&#7885;n nick yahoo c&#7847;n x&oacute;a!!!\');		
	return false;
}
</script>
'; ?>
