<?php /* Smarty version 2.6.13, created on 2016-04-02 10:36:38
         compiled from yahoo/yahoo_add.html */ ?>
<!-- Background wrapper -->
			<div id="bgwrap">		
				<!-- Main Content -->
				<div id="content">
					<div id="main">
						<h1>Thêm hỗ trợ</h1>
							<div class="pad20">
					<!-- Big buttons -->
							<form name="frm_yahoo_add" method="post" enctype="multipart/form-data" onSubmit="return check_value(frm_yahoo_add);">
							<!-- Fieldset -->
							<fieldset>   
							<legend>Thông tin</legend>
								<p><label for="sf">Nick: </label>
									<input type="text" size="50" name="nick" id="nick" maxlength="100"/>&nbsp;<font color="#FF0000">*</font> 
								</p>
								<p><label for="sf" style="vertical-align:top" >Họ tên & Bộ phận hỗ trợ: </label>
									<input type="text" size="50" name="fullname" id="fullname"  maxlength="255"/>&nbsp;<font color="#FF0000">*</font>
								</p>  								
								<p>								
									<input type="submit" class="button"  name="submit" value="Lưu"/>
								</p>		  
							</fieldset>
								<!-- End of fieldset -->		
							</form>
							</div> 
					</div>
				</div>	 
<?php echo '
<script language="javascript">
function check_value(form)
{
	if(form.nick.value=="")
	{
		form.onclick = $.prompt(\'Vui l&ograve;ng nh&#7853;p nick yahoo!!!\');
		form.nick.focus();
		return false;
	}		
	if(form.fullname.value=="")
	{
		form.onclick = $.prompt(\'Vui l&ograve;ng nh&#7853;p t&ecirc;n!!!\');
		form.fullname.focus();
		return false;
	}		
}
</script> 
'; ?>