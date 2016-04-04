<?php /* Smarty version 2.6.13, created on 2014-04-08 09:17:51
         compiled from news/news_manager.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'news/news_manager.html', 21, false),)), $this); ?>
<div id="bgwrap">		
				<!-- Main Content -->
				<div id="content">
					<div id="main">
						<h1>Quản lý tin tức</h1>        
				<?php if ($this->_tpl_vars['rs']): ?>		
				<form name="frm_news" method="POST">
<div style="text-align:right"><input type="button" name="btn_del" class="button" value="Xóa" onClick="del_news('frm_news');" />
  <input name="btnAddNew" type="button" value="Thêm" class="button" onclick="window.location='index.php?module=news&a=news_add'"/>
</div>				
				<table class="fullwidth" border="0" cellpadding="0" cellspacing="0"><tbody>
			  <thead><tr>    	
				<td width="15" align="center"><input type="checkbox" class="checkall" name="all" id="all"></td>
				<td align=""><b>Hình minh họa</b></td>				
				<td align=""><b>Tiêu đề</b></td>
				<td width="80"><b>Tin nóng?</b></td>				
				<td align="center"><b>Cập nhật sau cùng</b></td>
				<td align="center"><b>Thao tác</b></td>				
			  </tr></thead>
			  <?php $_from = $this->_tpl_vars['rs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rs'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rs']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['rs']):
        $this->_foreach['rs']['iteration']++;
?>
			 <tr bgcolor=<?php echo smarty_function_cycle(array('values' => "#FFFFFF,#EEEEEE"), $this);?>
>
				<td width="15" align="center"><input type="checkbox" class="checkboxnut"name="check_del[]" value="<?php echo $this->_tpl_vars['rs']['News_ID']; ?>
" /></td>
				<td><img src="<?php if ($this->_tpl_vars['rs']['Image_Name'] != ''):  echo @URL_NEWS_THUMB;  echo $this->_tpl_vars['rs']['Image_Name'];  else:  echo @URL_HOMEPAGE; ?>
/upload/no_image_50.jpg<?php endif; ?>" width="72" /></td>				
				<td><?php echo $this->_tpl_vars['rs']['Title']; ?>
</td>
				<td align="center"><a href="?module=news&a=update_hot&id=<?php echo $this->_tpl_vars['rs']['News_ID']; ?>
&hot=<?php echo $this->_tpl_vars['rs']['Hot']; ?>
"><img src="<?php echo @URL_HOMEPAGE; ?>
/cms/images/<?php if ($this->_tpl_vars['rs']['Hot'] == 1): ?>red_dot.gif"  class="tooltip" title="Tin nóng"<?php else: ?>green_dot.gif"  class="tooltip" title="Tin thường"<?php endif; ?> /></a></td>
				<td align="center" title="Tạo lúc <?php echo $this->_tpl_vars['rs']['Create_Time_Change']; ?>
 - <?php echo $this->_tpl_vars['rs']['Create_Name']; ?>
" class="tooltip"><?php echo $this->_tpl_vars['rs']['Update_Time_Change']; ?>
 - <?php echo $this->_tpl_vars['rs']['Update_Name']; ?>
</td>				      
				<td align="center" width="150"><a href="?module=news&a=news_edit&id=<?php echo $this->_tpl_vars['rs']['News_ID']; ?>
" title="Cập nhật thông tin" alt="Cập nhật thông tin" class="tooltip">Cập nhật</a></td>
			 </tr>
  				<?php endforeach; endif; unset($_from); ?>			
 <?php if ($this->_tpl_vars['paging']): ?>
 <tr><td align="center" colspan="9"><?php echo $this->_tpl_vars['paging']; ?>
</td></tr>
 <?php endif; ?>
 </tbody>
</table>
<div style="text-align:right"><input type="button" name="btn_del" class="button" value="Xóa" onClick="del_news('frm_news');" />
  <input name="btnAddNew" type="button" value="Thêm" class="button" onclick="window.location='index.php?module=news&a=news_add'"/>
</div></form>
<?php else: ?>
	 <div class="message information">
	<h2>Thông báo</h2>
	<p>Hiện tại chưa có thông tin</p>
</div>
			<?php endif; ?>
</div></div>
<?php echo '
	<script type="text/javascript" charset="utf-8">
	      
function del_news(frmName)
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
					frm.action = "?module=news&a=news_delete";
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