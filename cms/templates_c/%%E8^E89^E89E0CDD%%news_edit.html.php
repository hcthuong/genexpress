<?php /* Smarty version 2.6.13, created on 2014-04-08 09:17:55
         compiled from news/news_edit.html */ ?>
<!-- Background wrapper -->
			<div id="bgwrap">		
				<!-- Main Content -->
				<div id="content">
					<div id="main">
						<h1>Cập nhật tin tức</h1>
							<div class="pad20">
					<!-- Big buttons -->
							<form name="frm_news_edit" method="post" enctype="multipart/form-data" onSubmit="return check_value(frm_news_edit);">
							<!-- Fieldset -->
							<fieldset>   
							<legend>Thông tin</legend>
								<p><label for="sf">Tiêu đề: </label>
									<input type="text" class="mf" name="title" value="<?php echo $this->_tpl_vars['news']['Title']; ?>
" id="title" maxlength="200"/><font color="#FF0000"><b>*</b></font>
								</p>
                                <p><label for="sf">Tiêu đề (tiếng Anh): </label>
									<input type="text" class="mf" name="title_en" value="<?php echo $this->_tpl_vars['news']['Title_EN']; ?>
" id="title" maxlength="200"/><font color="#FF0000"><b>*</b></font>
								</p>
								<p><label for="sf" style="vertical-align:top" >Mô tả: </label>
									<textarea type="text" name="summary" cols="50" rows="5" id="summary"/><?php echo $this->_tpl_vars['news']['Summary']; ?>
</textarea>
								</p>
                                <p><label for="sf" style="vertical-align:top" >Mô tả (tiếng Anh): </label>
									<textarea type="text" name="summary_en" cols="50" rows="5" id="summary_en"/><?php echo $this->_tpl_vars['news']['Summary_EN']; ?>
</textarea>
								</p>  
								<p><label for="sf" style="vertical-align:top" >Chi tiết: </label>
									<?php echo $this->_tpl_vars['description']; ?>

								</p>
                                <p><label for="sf" style="vertical-align:top" >Chi tiết (tiếng Anh): </label>
									<?php echo $this->_tpl_vars['description_en']; ?>

								</p>   
								<p><label for="sf" style="vertical-align:top" >Hình minh họa: </label>
									<input type="file" name="filename" class="mf" /><?php if ($this->_tpl_vars['news']['Image_Name'] != ''): ?><input type="checkbox" class="checkboxnut"value="1" name="del_image" id="del_image" />Xóa ảnh<?php endif; ?>
								</p>     
								<p><label for="sf" style="vertical-align:top" >Nguồn tin: </label>
									<input type="text" name="source" class="mf" value="<?php echo $this->_tpl_vars['news']['Source']; ?>
" id="source" maxlength="100"/>
								</p>    	
								<p>								
									<input type="submit" class="button"  name="submit" value="Cập nhật"/>
								</p>		  
							</fieldset>
								<!-- End of fieldset -->		
							</form>
							</div> 
					</div>
				</div>		
<?php echo '
<script type="text/javascript" charset="utf-8">	
function check_value(form)
{
	if(form.title.value=="")
	{
		form.onclick = $.prompt(\'Vui lòng nhập tiêu đề!!!\');
		form.title.focus();
		return false;
	}

	if(form.summary.value=="")
	{
		form.onclick = $.prompt(\'Vui lòng tóm tắt nội dung!!!\');
		form.summary.focus();
		return false;
	}	
}
</script> 
'; ?>