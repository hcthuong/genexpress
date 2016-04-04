<?php /* Smarty version 2.6.13, created on 2016-04-02 10:04:25
         compiled from cms/diary_system.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'cms/diary_system.html', 19, false),)), $this); ?>
<div id="bgwrap">		
				<!-- Main Content -->
				<div id="content">
					<div id="main">
						<h1>Nhật ký hệ thống</h1>   
<?php if ($this->_tpl_vars['rs']): ?>    
				<form name="frm_diary" method="POST">
<div style="float:right"><input type="button" name="btn_del" class="button" value="Xóa" onClick="del_diary('frm_diary');" /></div>				
				<table class="fullwidth" border="0" cellpadding="0" cellspacing="0"><tbody>
				<thead><tr>
				<td width="15" align="center"><input type="checkbox" class="checkall" name="all" id="all"></td>
				<td align=""><b>Hành động</b></td>
				<td align=""><b>Module chức năng</b></td>    
				<td align=""><b>Người thực hiện</b></td>              
				<td align="center"><b>Thời gian thực hiện</b></td>
				</tr>
				</thead>
			  <?php $_from = $this->_tpl_vars['rs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rs'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rs']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['rs']):
        $this->_foreach['rs']['iteration']++;
?>
			 <tr bgcolor=<?php echo smarty_function_cycle(array('values' => "#FFFFFF,#EEEEEE"), $this);?>
>
				<td width="15" align="center"><input type="checkbox" class="checkboxnut"name="check_del[]" value="<?php echo $this->_tpl_vars['rs']['Diary_ID']; ?>
" /></td>
				<td><?php echo $this->_tpl_vars['rs']['Action']; ?>
</td>
				<td><?php if ($this->_tpl_vars['rs']['Module_Name'] == 'System'): ?>Hệ thống quản trị<?php else:  echo $this->_tpl_vars['rs']['Module_Name'];  endif; ?></td>
				<td><?php echo $this->_tpl_vars['rs']['Admin_Name']; ?>
</td>
				<td align="center"><?php echo $this->_tpl_vars['rs']['Create_Time_Change']; ?>
</td>
			 </tr>
  			<?php endforeach; endif; unset($_from); ?>
 <?php if ($this->_tpl_vars['paging']): ?> 
 <tr><td align="center" colspan="8"><?php echo $this->_tpl_vars['paging']; ?>
</td></tr>
 <?php endif; ?>
</tbody></table><br />
<div style="float:right"><input type="button" name="btn_del" class="button" value="Xóa" onClick="del_diary('frm_diary');" /></div></form>
 <?php else: ?>
 <div class="message information">
	<h2>Thông báo</h2>
	<p>Hiện tại chưa có thông tin</p>
</div>
 <?php endif; ?> 
</div></div>
<?php echo '
	<script type="text/javascript" charset="utf-8">
	      
function del_diary(frmName)
{
	var frm = document.forms[frmName];
	var items = document.getElementsByName("check_del[]");
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
				$.prompt(\'Bạn muốn xóa thông tin này?\',{ 
					buttons:{Ok:true, Cancel:false},
					callback: function(v,m){
				
					if(v){
					frm.action = "?module=cms&a=delete_system_diary";
					frm.submit();
					}
					else{}
					}
			});
	}
	else
		frm.onclick = $.prompt(\'Vui lòng chọn thông tin bạn muốn xóa!!!\');		
	return false;
}
</script>
'; ?>